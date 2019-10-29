# Colour

Validates colours, currently supporting hex codes only.

<p align="center">
  <a href="https://travis-ci.org/laravel-validation-rules/colour">
    <img src="https://img.shields.io/travis/laravel-validation-rules/colour.svg?style=flat-square">
  </a>
  <a href="https://scrutinizer-ci.com/g/laravel-validation-rules/colour/code-structure/master/code-coverage">
    <img src="https://img.shields.io/scrutinizer/coverage/g/laravel-validation-rules/colour.svg?style=flat-square">
  </a>
  <a href="https://scrutinizer-ci.com/g/laravel-validation-rules/colour">
    <img src="https://img.shields.io/scrutinizer/g/laravel-validation-rules/colour.svg?style=flat-square">
  </a>
  <a href="https://github.com/laravel-validation-rules/colour/blob/master/LICENSE">
    <img src="https://img.shields.io/github/license/laravel-validation-rules/colour.svg?style=flat-square">
  </a>
</p>

## Installation

```bash
composer require laravel-validation-rules/colour
```

## Usage

```php
use LVR\Colour\Hex;

$request->validate([
    'colour' => ['required', new Hex],
]);
```
