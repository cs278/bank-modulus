<?php

namespace Cs278\BankModulus\Spec\VocaLinkV380;

/**
 * @internal This class is not part of the public API of this package.
 * @codeCoverageIgnore
 */
final class Generator
{
    private $input;
    private $output;
    private $spec;
    private $indentLevel = 0;

    public function __construct($input, $output, $spec)
    {
        $this->input = is_resource($input) ? $input : fopen($input, 'r');
        $this->output = is_resource($output) ? $output : fopen($output, 'x');
        $this->spec = $spec;
    }

    public function generate($optimise)
    {
        $this->emit('<'."?php\n");
        $this->emit(sprintf("namespace %s;\n", __NAMESPACE__));
        $this->emit('/'.'**');
        $this->emit(' * @internal This class is not part of the public API of this package.');
        $this->emit(' */');
        $this->emit(sprintf('final class Data%s implements DataInterface', $this->spec));
        $this->emit('{');
        $this->indent();
        $this->emit('/'.'** @internal */');
        $this->emit('final public function fetchRecord($sortCode, $pass)');
        $this->emit('{');
        $this->indent();

        if ($optimise) {
            $this->generateOptimised();
        } else {
            $this->generateSimple();
        }

        $this->unindent();
        $this->emit('}');
        $this->unindent();
        $this->emit('}');
    }

    private function generateOptimised()
    {
        $seen = [];
        $uniqueWeights = [];
        $sortCodes = [];

        // Initial pass over data file, organise the unqiue return values and the
        // conditions required to hit them.
        while ($line = trim(fgets($this->input))) {
            $cols = preg_split('{\s+}', $line);

            $sortCodeStart = $cols[0];
            $sortCodeEnd = $cols[1];
            $algorithm = strtoupper($cols[2]);
            $weights = array_map('intval', array_slice($cols, 3, 6 + 8));
            $exception = isset($cols[17]) ? (int) $cols[17] : 0;
            $cols = null;

            $digest = hash('sha256', serialize([$algorithm, $exception, $weights]));

            if (!isset($uniqueWeights[$digest])) {
                $uniqueWeights[$digest] = [$algorithm, $exception, $weights];
                $sortCodes[$digest] = [];
            }

            if (!isset($seen[$sortCodeStart.$sortCodeEnd])) {
                $seen[$sortCodeStart.$sortCodeEnd] = 1;
            }

            $pass = $seen[$sortCodeStart.$sortCodeEnd]++;

            $sortCodes[$digest][] = [$pass, $sortCodeStart, $sortCodeEnd];
        }

        // Write out file content with a single if statement for each unique
        // return value.
        //
        // Statement looks something like this:
        //
        // if (
        //     (
        //         1 === $pass
        //         && (
        //             /* Sort code conditons */
        //         )
        //     )
        //     ||
        //     (
        //         2 === $pass
        //         && (
        //             /* Sort code conditons */
        //         )
        //     )
        // )
        foreach ($uniqueWeights as $digest => $weight) {
            $this->emit('if (');
            $this->indent();

            $passes = array_unique(array_column($sortCodes[$digest], 0));

            if (1 === count($passes)) {
                $this->emit(sprintf('%u === $pass', array_shift($passes)));
                $this->emit('&& (');
                $this->indent();

                foreach ($sortCodes[$digest] as $i => $row) {
                    $combiner = ($i === 0) ? '   ' : '|| ';

                    $this->emit($combiner.self::getComparison(null, $row[1], $row[2]));
                }

                $this->unindent();
                $this->emit(')');
            } else {
                // Multiple passes have the same data crazy if statement!
                foreach ($passes as $j => $pass) {
                    if ($j > 0) {
                        $this->emit('||');
                    }
                    $this->emit('(');
                    $this->indent();
                    $this->emit(sprintf('%u === $pass', $pass));
                    $this->emit('&& (');
                    $this->indent();

                    $passSortCodes = array_values(array_filter($sortCodes[$digest], function ($row) use ($pass) {
                        return $pass === $row[0];
                    }));

                    foreach ($passSortCodes as $i => $row) {
                        $combiner = ($i === 0) ? '   ' : '|| ';

                        $this->emit($combiner.self::getComparison(null, $row[1], $row[2]));
                    }

                    $this->unindent();
                    $this->emit(')');
                    $this->unindent();
                    $this->emit(')');
                }
            }

            $this->unindent();
            $this->emit(') {');
            $this->indent();
            $this->emit(sprintf(
                'return [%s, [%s], %u];',
                var_export($weight[0], true),
                implode(', ', $weight[2]),
                $weight[1]
            ));
            $this->unindent();
            $this->emit('}');
            $this->nl();
        }

        $this->gobble(1); // Remove a \n
    }

    private function generateSimple()
    {
        $seen = [];

        while ($line = trim(fgets($this->input))) {
            $cols = preg_split('{\s+}', $line);

            $sortCodeStart = $cols[0];
            $sortCodeEnd = $cols[1];
            $algorithm = strtoupper($cols[2]);
            $weights = array_map('intval', array_slice($cols, 3, 6 + 8));
            $exception = isset($cols[17]) ? (int) $cols[17] : 0;
            $cols = null;

            if (!isset($seen[$sortCodeStart.$sortCodeEnd])) {
                $seen[$sortCodeStart.$sortCodeEnd] = 1;
            }

            $this->emit(sprintf(
                'if %s {',
                self::getComparison(
                    $seen[$sortCodeStart.$sortCodeEnd],
                    $sortCodeStart,
                    $sortCodeEnd
                )
            ));
            $this->indent();
            $this->emit(sprintf(
                'return [%s, [%s], %u];',
                var_export($algorithm, true),
                implode(', ', $weights),
                $exception
            ));
            $this->unindent();
            $this->emit('}');
            $this->nl();

            ++$seen[$sortCodeStart.$sortCodeEnd];
        }

        $this->gobble(1); // Remove a \n
    }

    private static function getComparison($pass, $start, $end)
    {
        $conditons = [];

        if (null !== $pass) {
            $conditons[] = '%1$u === $pass';
        }

        if ($start === $end) {
            $conditons[] = '\'%2$s\' === $sortCode';
        } else {
            $conditons[] = '\'%2$s\' <= $sortCode';
            $conditons[] = '$sortCode <= \'%3$s\'';
        }

        $format = implode(' && ', $conditons);

        if (count($conditons) > 1) {
            $format = "($format)";
        }

        return sprintf(
            $format,
            $pass,
            $start,
            $end
        );
    }

    private function emit($code, $line = true)
    {
        if ($line && $this->indentLevel) {
            fwrite($this->output, str_repeat('    ', $this->indentLevel));
        }

        fwrite($this->output, $code);

        if ($line) {
            $this->nl();
        }
    }

    private function nl()
    {
        fwrite($this->output, "\n");
    }

    private function gobble($n)
    {
        fseek($this->output, ftell($this->output) - $n);
    }

    private function indent()
    {
        ++$this->indentLevel;
    }

    private function unindent()
    {
        $this->indentLevel = max($this->indentLevel - 1, 0);
    }
}

// Violation of PSR1/2 but it's a dev file so sue me.
if ('cli' === PHP_SAPI && isset($_SERVER['PHP_SELF']) && __FILE__ === realpath($_SERVER['PHP_SELF'])) {
    array_shift($argv); // discard

    $optimise = false;

    while ($arg = array_shift($argv)) {
        if (strpos($arg, '--') === 0) {
            if ($arg === '--optimise') {
                $optimise = true;
            }
        } else {
            $spec = $arg;
        }
    }

    (new Generator(STDIN, STDOUT, $spec))
        ->generate($optimise);
}
