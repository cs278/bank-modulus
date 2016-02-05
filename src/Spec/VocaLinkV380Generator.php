<?php

namespace Cs278\BankModulus\Spec;

final class VocaLinkV380Generator
{
    private $input;
    private $output;
    private $indentLevel = 0;

    public function __construct($input, $output)
    {
        $this->input = is_resource($input) ? $input : fopen($input, 'r');
        $this->output = is_resource($output) ? $output : fopen($output, 'x');
    }

    public function generate($optimise)
    {
        $this->emit('<'."?php\n");
        $this->emit(sprintf("namespace %s;\n", __NAMESPACE__));
        $this->emit('/'.'** @internal */');
        $this->emit("abstract class VocaLinkV380Data");
        $this->emit("{");
        $this->indent();
        $this->emit('/'.'** @internal */');
        $this->emit('final protected function fetchRecord($sortCode, $pass)');
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
        foreach ($uniqueWeights as $digest => $weight) {
            $this->emit('if (');
            $this->indent();

            foreach ($sortCodes[$digest] as $i => $row) {
                $combiner = ($i === 0) ? '   ' : '|| ';

                $this->emit($combiner.self::getComparison($row[0], $row[1], $row[2]));
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
        if ($start === $end) {
            return sprintf(
                '(%u === $pass && \'%s\' === $sortCode)',
                $pass,
                $start
            );
        }

        return sprintf(
            '(%u === $pass && \'%s\' <= $sortCode && $sortCode <= \'%s\')',
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
    (new VocaLinkV380Generator(STDIN, STDOUT))
        ->generate(isset($argv[1]) && $argv[1] === '--optimise');
}
