# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [v1.13.0] - 2021-12-09

### Added
- Implemented VocaLink V6.80 specification.
- Implemented VocaLink V7.30 specification.

### Changed
- Update PHPStan to 1.2.0.
- Improve type safety in modulus calculation code.
- Configure dependabot for dependency updates.
- Began testing on PHP 8.1.

## [v1.12.0] - 2021-01-26

### Added
- Implemented VocaLink V6.40 specification.

### Changed
- Raised minimum PHP version required to 5.6.0, 7.2.0 or 8.0.0.
- Updated minimum PHPUnit version to 5.4.3 for unit tests.
- PHPUnit 8.5 and 9.0 can now be used to run the unit tests.
- PHPUnit 6 and 7 are no longer supported.
- Raised minimum version of `webmozart/assert` to 1.2.0.

## [v1.11.0] - 2020-02-14

### Added
- Implemented VocaLink V5.90 specification.
- `BankAccountNormalized` now implements new interface `BankAccountNormalizedInterface`.

### Changed
- Began testing on PHP 7.4.
- Upgraded to PHPStan 0.12.x.

### Deprecated
- `NormalizerInterface::normalize()` will return `BankAccountNormalizedInterface`
  in version 2.0.
- `BankAccountNormalized::LENGTH` will be removed in version 2.0, replace with
  `BankAccountNormalizedInterface::ACCOUNT_NUMBER_LENGTH`.

## [v1.10.0] - 2019-09-18

### Added
- Implemented VocaLink V5.40 specification.
- Implemented VocaLink V5.50 specification.
- Implemented VocaLink V5.70 specification.
- Implemented VocaLink V5.80 specification.

### Changed
- Dropped testing on the following PHP versions:
  * 5.4 (No longer supported by Travis)
  * 5.5 (No longer supported by Travis)
  * 7.0
  * 7.1
  * Nightly
- Added testing for the following PHP versions:
  * 7.3
- Updated minimum PHPUnit version to 5.0.0 for unit tests.
- PHPUnit 6.5 and 7.5 can now be used to run unit tests.

## [v1.9.0] - 2018-11-09

### Added
- Implemented VocaLink V5.30 specification.
- New `Result::getValidatedAt()` method to get time the validation was performed.

## [v1.8.0] - 2018-10-16

### Added
- Implemented VocaLink V5.10 specification.
- New `DefaultSpecFactory::withDate()` method to overload the date reference
  point for selection specifications.
- Implemented VocaLink V5.20 specification.

### Deprecated
- Marked `DefaultSpecFactory::withNow()` for removal, was `@internal` so should
  not impact consumers of this library. Use instance method
  `DefaultSpecFactory::withDate()` instead.

### Removed
- No longer testing on HHVM as PHP language support being dropped.

## [v1.7.0] - 2018-07-04

### Added
- Implemented VocaLink V4.90 specification.
- Implemented VocaLink V5.00 specification.

## [v1.6.0] - 2018-03-19

### Added
- Implemented VocaLink V4.70 specification.
- Implemented VocaLink V4.80 specification.

## [v1.5.0] - 2017-10-04

### Added
- Implemented VocaLink V4.60 specification

  Includes support for V4.50 specification which does not appear to have been
  released publicly.

### Changed
- Start running tests on PHP 7.2
- Consider 7.1 mainline PHP version for tests

## [v1.4.0] - 2017-08-24

### Added
- Implemented VocaLink V4.40 specification

## [v1.3.0] - 2017-07-06

### Added
- Implemented VocaLink V4.30 specification

## [v1.2.0] - 2017-05-09

### Added
- Implemented VocaLink V4.20 specification

### Changed
- Began running tests on PHP 7.1

## [v1.1.0] - 2017-03-02

### Added
- Implemented VocaLink V4.00 specification
- Refactored to use a factory to create `SpecInterface` objects, this allows
  specifications to be implemented and released ahead of their effective date.
- Implemented VocaLink V4.10 specification

## Deprecated
- Supplying a `SpecInterface` to `BankModulus::__construct()` has been deprecated,
  either implement `SpecFactoryInterface` or use `SimpleSpecFactory`.

## [v1.0.0] - 2016-08-26

### Added
- Implemented VocaLink V3.90 specification
- Stored specifications in the repository

## [v1.0.0-beta3] - 2016-02-11

### Added
- `BankModulus::lookup()` which returns a `Result` object that models the result
  better than a simple boolean.
- Improved argument validation
- Better test coverage
- Expanded documentation

### Removed
- `BankModulus::isValid()` has been removed in favour of `BankModulus::lookup()`

## [v1.0.0-beta2] - 2016-02-08

### Added
- Initial documentation

### Removed
- Internal `intdiv()` polyfill

## [v1.0.0-beta1] - 2016-02-07

### Added
- Implemented VocaLink V3.80 specification

[v1.13.0]: https://github.com/cs278/bank-modulus/compare/v1.12.0...v1.13.0
[v1.12.0]: https://github.com/cs278/bank-modulus/compare/v1.11.0...v1.12.0
[v1.11.0]: https://github.com/cs278/bank-modulus/compare/v1.10.0...v1.11.0
[v1.10.0]: https://github.com/cs278/bank-modulus/compare/v1.9.0...v1.10.0
[v1.9.0]: https://github.com/cs278/bank-modulus/compare/v1.8.0...v1.9.0
[v1.8.0]: https://github.com/cs278/bank-modulus/compare/v1.7.0...v1.8.0
[v1.7.0]: https://github.com/cs278/bank-modulus/compare/v1.6.0...v1.7.0
[v1.6.0]: https://github.com/cs278/bank-modulus/compare/v1.5.0...v1.6.0
[v1.5.0]: https://github.com/cs278/bank-modulus/compare/v1.4.0...v1.5.0
[v1.4.0]: https://github.com/cs278/bank-modulus/compare/v1.3.0...v1.4.0
[v1.3.0]: https://github.com/cs278/bank-modulus/compare/v1.2.0...v1.3.0
[v1.2.0]: https://github.com/cs278/bank-modulus/compare/v1.1.0...v1.2.0
[v1.1.0]: https://github.com/cs278/bank-modulus/compare/v1.0.0...v1.1.0
[v1.0.0]: https://github.com/cs278/bank-modulus/compare/v1.0.0-beta3...v1.0.0
[v1.0.0-beta3]: https://github.com/cs278/bank-modulus/compare/v1.0.0-beta2...v1.0.0-beta3
[v1.0.0-beta2]: https://github.com/cs278/bank-modulus/compare/v1.0.0-beta1...v1.0.0-beta2
[v1.0.0-beta1]: https://github.com/cs278/bank-modulus/compare/dae2709...v1.0.0-beta1
