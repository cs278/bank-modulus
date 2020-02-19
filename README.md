UK Bank Modulus Check Library
=============================

[![Main](https://github.com/cs278/bank-modulus/workflows/Main/badge.svg?branch=master)](https://github.com/cs278/bank-modulus/actions)
[![Build Status](https://travis-ci.org/cs278/bank-modulus.svg?branch=master)](https://travis-ci.org/cs278/bank-modulus)
[![Code Quality](https://scrutinizer-ci.com/g/cs278/bank-modulus/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/cs278/bank-modulus/?branch=master)
[![Coverage](https://scrutinizer-ci.com/g/cs278/bank-modulus/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/cs278/bank-modulus/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/cs278/bank-modulus/v/stable.svg)](https://packagist.org/packages/cs278/bank-modulus)
[![Total Downloads](https://poser.pugx.org/cs278/bank-modulus/downloads.svg)](https://packagist.org/packages/cs278/bank-modulus)

This PHP library allows you to check the validity of UK bank account
information. To perform this task it uses publicly available information and
the specifications published by VocaLink.

You must be aware that this library cannot tell you that the account number and
sort code associate to an active account, it only tells you that they *could* be
assigned to an account. Neither does it cover all sort codes, some of which are
outside the specification and you should assume those details are valid unless
otherwise known.

Usage
-----

### Basics

This library provides a simple class to perform bank account validation and
normalisation, through the `BankModulus` class.

By default the `BankModulus` class will use the current modulus specification
issued by VocaLink, the default specification factory will pick the correct
specification based on the date.

* `normalize(string &$sortCode, string &$accountNumber)`

  This performs normalisation of sort code and account numbers according to rules
  issued by some banks. As an example 6 digit account numbers get padded with two
  zeros.

  The result of normalisation is assigned back to the input parameters.

* `check(string $sortCode, string $accountNumber) : boolean`

  This is the primary method to ascertain if the details supplied are invalid, it
  returns `false` if the sort code and account number are invalid otherwise it
  will return `true`. If the details provided are syntactically valid but fall
  outside the specification then this method considers them valid.

* `lookup(string $sortCode, string $accountNumber) : Result`

  Use this method to fetch more in depth information on the sort code and account
  number. See documentation on the `Result` class for more information.

* `__construct(SpecFactoryInterface $specFactory, NormalizerInterface $normalizer)`

  You can change which specification factory and normalizer is used at the time of
  construction, otherwise defaults will be used.

* Example:

  ```php
  <?php

  use Cs278\BankModulus\BankModulus;

  $modulus = new BankModulus();
  $modulus->check('08-16-32', '12481632');

  $sortCode = '12-24-48';
  $accountNumber = '123456';

  $modulus->normalize($sortCode, $accountNumber);

  var_dump($sortCode, $accountNumber);
  // string(6) "122448"
  // string(8) "00123456"
  ```

### `Result` class

The `Result` class provides detailed information on the validation and
normalisation results.

* `getSortCode() : SortCode`

  Returns a `SortCode` object representing the normalised sort code.

* `getAccountNumber() : string`

  Returns a string of the normalised account number.

* `isValidated() : boolean`

  Returns a boolean which is true iff the sort code and account number could be
  validated using the specification.

* `isValid($assume = true) : boolean`

  Returns a boolean representing the result of the modulus validation, if the
  sort code and account number could not be validated the value of the `$assume`
  argument is returned.

### Specification Factory

The default specification factory (`Spec\DefaultSpecFactory`) picks the most
appropriate specification for the current time.

If you need to test the validity of a sort code and account number at a particular
point in time, you can use the `withDate(\DateTimeInterface|string $date): self`
method to overload the currently used time reference. If you supply an object to
this method it will convert it to the date in `Europe/London`, string date is
used verbatim.

### Exceptions

This library will throw exceptions implementing `Exception\Exception` if
something unexpected occurs.

* `Exception\AccountNumberInvalidException`

  The supplied account number was not a string of 8 numerical digits.

* `Exception\CannotValidateException`

  This is thrown by an instance of `Spec\SpecInterface` when it cannot determine
  if the details are correct because they fall outside the specification.

* `Exception\SortCodeInvalidException`

  The supplied sort code was not a string of 6 numerical digits.


### Modulus Algorithms

Currently this library implements 3 similar algorithms to perform modulus
calculations, these are defined in the VocaLink specification.

* Standard Modulus (`Mod10`/`Mod11`)

  Multiplication of each digit in sort code and account number with a
  corresponding weight value, the results are summed and then divided by `10` or
  `11` depending on the algorithm being used. A remainder of `0` means the input
  was valid.

* Double Alternate (`DblAl`)

  Each digit of the sort code and account number is multiplied by the corresponding
  weight value, each result is then split into digits and summed (e.g. `24` becomes
  `2+4`). Then the results are summed and divided by `10`, again a remainder of
  `0` is indicative of success.
