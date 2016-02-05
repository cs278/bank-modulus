<?php

namespace Cs278\BankModulus\Spec;

final class VocaLinkV380Generator
{
    public static function generate($input, $output, $optimise)
    {
        $inHandle = is_resource($input) ? $input : fopen($input, 'r');
        $outHandle = is_resource($output) ? $output : fopen($output, 'x');

        $tab = '    ';

        fwrite($outHandle, '<'."?php\n\n");
        fwrite($outHandle, sprintf("namespace %s;\n\n", __NAMESPACE__));
        fwrite($outHandle, '/'.'** @internal */'."\n");
        fwrite($outHandle, "abstract class VocaLinkV380Data\n{\n");
        fwrite($outHandle, $tab.'/'.'** @internal */'."\n");
        fwrite($outHandle, $tab.'final protected function fetchRecord($sortCode, $pass)'."\n$tab{\n");

        if ($optimise) {
            self::generateOptimised($inHandle, $outHandle);
        } else {
            self::generateSimple($inHandle, $outHandle);
        }

        fwrite($outHandle, "$tab}\n"); // Close function
        fwrite($outHandle, "}\n"); // Close class

        fclose($inHandle);
        fclose($outHandle);
    }

    private static function generateOptimised($inHandle, $outHandle)
    {
        $tab = '        ';

        $seen = [];
        $uniqueWeights = [];
        $sortCodes = [];

        // Initial pass over data file, organise the unqiue return values and the
        // conditions required to hit them.
        while ($line = trim(fgets($inHandle))) {
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
            fwrite($outHandle, "{$tab}if (\n");

            foreach ($sortCodes[$digest] as $i => $row) {
                $combiner = ($i === 0) ? '   ' : '|| ';

                fwrite($outHandle, "$tab    $combiner");
                fwrite($outHandle, self::getComparison($row[0], $row[1], $row[2]));
                fwrite($outHandle, "\n");
            }

            fwrite($outHandle, "{$tab}) {\n");
            fwrite($outHandle, sprintf(
                "$tab    return [%s, [%s], %u];\n",
                var_export($weight[0], true),
                implode(', ', $weight[2]),
                $weight[1]
            ));
            fwrite($outHandle, "{$tab}}\n\n");
        }
        fseek($outHandle, ftell($outHandle) - 1); // Remove a \n
    }

    private static function generateSimple($inHandle, $outHandle)
    {
        $tab = '        ';
        $seen = [];

        while ($line = trim(fgets($inHandle))) {
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

            fwrite($outHandle, sprintf(
                $tab.'if %s {'."\n",
                self::getComparison(
                    $seen[$sortCodeStart.$sortCodeEnd],
                    $sortCodeStart,
                    $sortCodeEnd
                )
            ));

            fwrite($outHandle, sprintf(
                $tab.'    return [%s, [%s], %u];'."\n",
                var_export($algorithm, true),
                implode(', ', $weights),
                $exception
            ));

            fwrite($outHandle, "$tab}\n\n");

            ++$seen[$sortCodeStart.$sortCodeEnd];
        }

        fseek($outHandle, ftell($outHandle) - 1); // Remove a \n
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
}

// Violation of PSR1/2 but it's a dev file so sue me.
if ('cli' === PHP_SAPI && isset($_SERVER['PHP_SELF']) && __FILE__ === realpath($_SERVER['PHP_SELF'])) {
    VocaLinkV380Generator::generate(STDIN, STDOUT, isset($argv[1]) && $argv[1] === '--optimise');
}
