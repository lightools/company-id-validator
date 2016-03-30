## Introduction

Simple validation of Czech company ID (IČ).

## Installation

```sh
$ composer require lightools/company-id-validator
```

## Simple usage

```php
$validator = new Lightools\CompanyIdValidator\CompanyIdValidator();
$validator->isValidId('27082440'); // true
$validator->isValidId('25596641'); // true
$validator->isValidId('1859951'); // true (leading zero added, you can disable this function in constructor)
$validator->isValidId('12345678'); // false
```

## Further validation

If you want to know if subject with some ID really exists, you can use [lightools/ares](https://github.com/lightools/ares).

## How to run tests

```sh
$ vendor/bin/tester tests
```
