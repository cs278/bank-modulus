<?php

namespace Cs278\BankModulus\Spec;

use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\SortCode;
use Cs278\BankModulus\ModulusAlgorithm;

final class VocaLinkV380 implements SpecInterface
{
    const U = 0;
    const V = 1;
    const W = 2;
    const X = 3;
    const Y = 4;
    const Z = 5;
    const A = 6;
    const B = 7;
    const C = 8;
    const D = 9;
    const E = 10;
    const F = 11;
    const G = 12;
    const H = 13;

    public function check(BankAccountNormalized $bankAccount)
    {
        $data = $this->lookupWeightingData($bankAccount->getSortCode());

        if (1 === count($data)) {
            $data = $data[0];

            return $this->applySingleModulus(
                $bankAccount,
                $data[0],
                $data[1],
                (int) $data[2]
            );
        } else {
            return false;
        }
    }

    private function lookupWeightingData(SortCode $sortCode)
    {
        $weights = require __DIR__.'/VocaLinkV380Weights.php';
        $sortCode = $sortCode->format('%s%s%s');

        return array_filter([
            isset($weights[$sortCode.'0']) ? $weights[$sortCode.'0'] : null,
            isset($weights[$sortCode.'1']) ? $weights[$sortCode.'1'] : null,
        ]);
    }

    private function applySingleModulus(BankAccountNormalized $bankAccount, $algorithm, $weights, $exception)
    {
        $chars = (string) $bankAccount;

        if (6 === $exception) {
            // If a = 4, 5, 6, 7 or 8, and g and h are the same, the accounts
            // are for a foreign currency and the checks cannot be used.
            if (
                (
                    $chars[self::A] === 4
                    || $chars[self::A] === 5
                    || $chars[self::A] === 6
                    || $chars[self::A] === 7
                    || $chars[self::A] === 8
                )
                && $chars[self::G] === $chars[self::H]
            ) {
                return false;
            }
        }

        if (7 === $exception && 9 === $chars[self::G]) {
            $weights[self::U] = '0';
            $weights[self::V] = '0';
            $weights[self::W] = '0';
            $weights[self::X] = '0';
            $weights[self::Y] = '0';
            $weights[self::Z] = '0';
            $weights[self::A] = '0';
            $weights[self::B] = '0';
        }

        if (8 === $exception || 5 === $exception) {
            $chars = $this->substituteSortCode($chars);
        }

        switch ($algorithm) {
            case 'MOD10':
                $modulus = ModulusAlgorithm::mod10($chars, $weights);
                var_dump($modulus);
                break;
            case 'MOD11':
                if (4 === $exception) {
                    // TODO Polycast?!
                    $remainder = (int) fmod(ModulusAlgorithm::calculateMod($chars, $weights), 11);

                    return $remainder === intval($chars[self::G].$chars[self::H]);
                }

                $modulus = ModulusAlgorithm::mod11($chars, $weights);
                break;
            case 'DBLAL':
                if (
                    3 === $exception
                    && (6 === $chars[self::C] || 9 === $chars[self::C])
                ) {
                    return true;
                }

                $modulus = ModulusAlgorithm::dblAl($chars, $weights);

                if (1 === $exception) {
                    $modulus = ($modulus + 27) % 10;
                }

                break;
        }

        return 0 === $modulus;
    }

    private function substituteSortCode($chars, $exception)
    {
        if (8 === $exception) {
            return '090126'.substr($chars, 6);
        }

        if (5 === $exception) {
            $replacements = [
                '938173' => '938017',
                '938289' => '938068',
                '938297' => '938076',
                '938600' => '938611',
                '938602' => '938343',
                '938604' => '938603',
                '938608' => '938408',
                '938609' => '938424',
                '938613' => '938017',
                '938616' => '938068',
                '938618' => '938657',
                '938620' => '938343',
                '938622' => '938130',
                '938628' => '938181',
                '938643' => '938246',
                '938647' => '938611',
                '938648' => '938246',
                '938649' => '938394',
                '938651' => '938335',
                '938653' => '938424',
                '938654' => '938621',
            ];

            $sortCode = substr($chars, 0, 6);

            if (isset($replacements[$sortCode])) {
                return $replacements[$sortCode].substr($chars, 6);
            }
        }

        return $chars;
    }

    public static function processWeightData($input, $output)
    {
        $inHandle = fopen($input, 'r');
        $outHandle = is_resource($output) ? $output : fopen($output, 'x');

        $seen = [];

        fwrite($outHandle, '<'."?php\n\n");
        fwrite($outHandle, "return [\n");

        while ($line = trim(fgets($inHandle))) {
            $cols = preg_split('{\s+}', $line);

            $sortCodeStart = $cols[0];
            $sortCodeEnd = $cols[1];
            $algorithm = strtoupper($cols[2]);
            $weights = array_map('intval', array_slice($cols, 3, 6 + 8));
            $exception = isset($cols[17]) ? (int) $cols[17] : 0;

            foreach (range($sortCodeStart, $sortCodeEnd) as $sortCode) {
                $sortCode = sprintf('%06d', $sortCode);

                if (!isset($seen[$sortCode])) {
                    $seen[$sortCode] = 0;
                }

                fwrite($outHandle, sprintf(
                    '    %s => [%s, %s, %u],',
                    var_export($sortCode.$seen[$sortCode], true),
                    var_export($algorithm, true),
                    var_export(implode('', $weights), true),
                    $exception
                ));
                fwrite($outHandle, PHP_EOL);

                ++$seen[$sortCode];

                // break;
            }
        }


        fwrite($outHandle, "];\n");

        fclose($inHandle);
        fclose($outHandle);
    }

    // private function createCharArray($string)
    // {
    //     return array_combine([
    //         'u', 'v', 'w', 'x', 'y', 'z',
    //         'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
    //     ], str_split($string));
    // }
}
