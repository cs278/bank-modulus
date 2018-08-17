# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## Unreleased

### Added
- Implemented VocaLink V5.10 specification.

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
