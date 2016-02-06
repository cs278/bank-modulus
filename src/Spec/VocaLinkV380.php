<?php

namespace Cs278\BankModulus\Spec;

use Cs278\BankModulus\BankAccountNormalized;
use Cs278\BankModulus\Exception\SortCodeUnknownException;
use Cs278\BankModulus\ModulusAlgorithm\DblAl;
use Cs278\BankModulus\ModulusAlgorithm\Mod10;
use Cs278\BankModulus\ModulusAlgorithm\Mod11;
use Cs278\BankModulus\SortCode;

final class VocaLinkV380 extends VocaLinkV380Data implements SpecInterface
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

    const MOD10 = 'MOD10';
    const MOD11 = 'MOD11';
    const DBLAL = 'DBLAL';

    public function check(BankAccountNormalized $bankAccount)
    {
        $checks = $this->fetch($bankAccount->getSortCode());
        $numChecks = count($checks);

        if (1 === $numChecks) {
            $check = $checks[0];

            if (14 === $check[2] && self::MOD11 === $check[0]) {
                if ($this->applySingleModulus($bankAccount, $check, 1)) {
                    return true;
                }

                return $this->applySingleModulus($bankAccount, $check, 2);
            }

            return $this->applySingleModulus(
                $bankAccount,
                $check,
                1
            );
        } elseif (2 === $numChecks) {
            if (2 === $checks[0][2] && 9 === $checks[1][2]) {
                // Exception 2 & 9
                $chars = (string) $bankAccount;
                if ('0' !== $chars[self::A]) {
                    if ('9' === $chars[self::G]) {
                        $checks[0][1] = [0, 0, 0, 0, 0, 0, 0, 0, 8, 7, 10, 9, 3, 1];
                    } else {
                        $checks[0][1] = [0, 0, 1, 2, 5, 3, 6, 4, 8, 7, 10, 9, 3, 1];
                    }
                }

                return $this->applyDoubleOrModulus($bankAccount, $checks[0], $checks[1]);
            }

            if (10 === $checks[0][2] && 11 === $checks[1][2]) {
                // Exception 10 & 11
                return $this->applyDoubleOrModulus($bankAccount, $checks[0], $checks[1]);
            }

            if (12 === $checks[0][2] && 13 === $checks[1][2]) {
                // Exception 12 & 13
                // Where there is a 12 in the exception column for the first
                // check for a sorting code and a 13 in the exception column for
                // the second check for the same sorting code, if either check
                // is successful the account number is deemed valid.
                return $this->applyDoubleOrModulus($bankAccount, $checks[0], $checks[1]);
            }

            if (6 === $checks[0][2] && 6 === $checks[1][2]) {
                // If a = 4, 5, 6, 7 or 8, and g and h are the same, the
                // accounts are for a foreign currency and the checks cannot be
                // used.
                $chars = (string) $bankAccount;

                if (
                    $chars[self::G] === $chars[self::H]
                    && 4 <= $chars[self::A]
                    && 8 >= $chars[self::A]
                ) {
                    return true;
                }
            }

            return $this->applyDoubleAndModulus($bankAccount, $checks[0], $checks[1]);
        } else {
            throw new SortCodeUnknownException();
        }
    }

    private function fetch(SortCode $sortCode)
    {
        $sortCode = $sortCode->format('%s%s%s');

        $record1 = $this->fetchRecord($sortCode, 1);

        if (null === $record1) {
            return [];
        }

        $record2 = $this->fetchRecord($sortCode, 2);

        if ($record2) {
            return [$record1, $record2];
        }

        return [$record1];
    }

    private function applyDoubleAndModulus(BankAccountNormalized $bankAccount, array $checkOne, array $checkTwo)
    {
        return $this->applySingleModulus($bankAccount, $checkOne, 1)
            && $this->applySingleModulus($bankAccount, $checkTwo, 2);
    }

    private function applyDoubleOrModulus(BankAccountNormalized $bankAccount, array $checkOne, array $checkTwo)
    {
        return $this->applySingleModulus($bankAccount, $checkOne, 1)
            || $this->applySingleModulus($bankAccount, $checkTwo, 2);
    }

    private function applySingleModulus(BankAccountNormalized $bankAccount, array $check, $pass)
    {
        $chars = (string) $bankAccount;
        list($algorithm, $weights, $exception) = $check;

        if (3 === $exception && self::DBLAL === $algorithm) {
            if ('6' === $chars[self::C]) {
                return true;
            }

            if ('9' === $chars[self::C]) {
                return true;
            }
        }

        if (6 === $exception) {
            // If a = 4, 5, 6, 7 or 8, and g and h are the same, the accounts
            // are for a foreign currency and the checks cannot be used.
            if (
                (
                    '4' === $chars[self::A]
                    || '5' === $chars[self::A]
                    || '6' === $chars[self::A]
                    || '7' === $chars[self::A]
                    || '8' === $chars[self::A]
                )
                && $chars[self::G] === $chars[self::H]
            ) {
                return false;
            }
        }

        if (7 === $exception && '9' === $chars[self::G]) {
            self::zeroizeFirst8($weights);
        }

        if (9 === $exception && 2 === $pass) {
            // Exception 9
            // Replace sort code with 30-96-34.
            $chars = substr_replace($chars, '309634', self::U, 6);
        }

        // For the exception 10 check, if ab = 09 or ab = 99 and g = 9, zeroise weighting positions u-b.
        if (
            10 === $exception
            && (
                ('0' === $chars[self::A] && '9' === $chars[self::B])
                || ('9' === $chars[self::A] && '9' === $chars[self::B])
            )
            && '9' === $chars[self::G]
        ) {
            self::zeroizeFirst8($weights);
        }

        if (8 === $exception || 5 === $exception) {
            $chars = $this->substituteSortCode($chars, $exception);
        }

        if (14 === $exception && 2 === $pass) {
            // Second check:
            // • If the 8th digit of the account number (reading from left to right) is
            //   not 0, 1 or 9 then the account number fails the second check and is not
            //   a valid Coutts account number.
            // • If the 8th digit is 0, 1 or 9, then remove the digit from the account
            //   number and insert a 0 as the 1st digit for check purposes only.
            // • Perform the modulus 11 check on the modified account number using the
            //   same weightings as specified in the table (that is, 0 0 0 0 0 0 8 7 6
            //   5 4 3 2 1):
            //     – If there is no remainder, then the account number should be
            //       considered valid
            //     – If there is a remainder, then the account number fails the second
            //       check and is not a valid Coutts account number
            if (1 < $chars[self::H] && 9 > $chars[self::H]) {
                return false;
            }

            $chars = substr(substr_replace($chars, '0', self::A, 0), 0, self::H + 1);
        }

        switch ($algorithm) {
            case self::MOD10:
                $result = (new Mod10($chars, $weights))->check();
                break;
            case self::MOD11:
                $modulus = new Mod11($chars, $weights);

                if (4 === $exception) {
                    return $modulus->remainder() === intval($chars[self::G].$chars[self::H]);
                }

                if (5 === $exception) {
                    // After dividing the result by 11:
                    // – if the remainder = 0 and g = 0 the account number is valid
                    // – if the remainder = 1 the account number is invalid
                    // – for all other remainders, take the remainder away from 11. If the number you get is the same
                    // as g then the account number is valid.
                    $remainder = $modulus->remainder();

                    if (0 === $remainder && '0' === $chars[self::G]) {
                        return true;
                    }

                    if (1 === $remainder) {
                        return false;
                    }

                    return (11 - $remainder) === (int) $chars[self::G];
                }

                $result = $modulus->check();
                break;
            case self::DBLAL:
                if (
                    3 === $exception
                    && (6 === $chars[self::C] || 9 === $chars[self::C])
                ) {
                    return true;
                }

                $modulus = new DblAl($chars, $weights);

                if (5 === $exception) {
                    // After dividing the result by 10:
                    //  – if the remainder = 0 and h = 0 the account number is
                    //    valid.
                    //  – for all other remainders, take the remainder away
                    //    from 10. If the number you get is the same as h then
                    //    the account number is valid.
                    $remainder = $modulus->remainder();

                    if (0 === $remainder && '0' === $chars[self::H]) {
                        return true;
                    }

                    return (10 - $remainder) === (int) $chars[self::H];
                }

                $result = $modulus->check();

                if (1 === $exception && !$result) {
                    $result = 0 === (($modulus->remainder() + 27) % 10);
                }

                break;
        }

        return true === $result;
    }

    private static function zeroizeFirst8(&$input)
    {
        $input[self::U] = 0;
        $input[self::V] = 0;
        $input[self::W] = 0;
        $input[self::X] = 0;
        $input[self::Y] = 0;
        $input[self::Z] = 0;
        $input[self::A] = 0;
        $input[self::B] = 0;
    }

    private static function zeroize(&$input, array $pos)
    {
        foreach ($pos as $p) {
            $input[$p] = 0;
        }
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
}
