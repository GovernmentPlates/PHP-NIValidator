# PHP-NIValidator
A simple and fast UK National Insurance (N.I.) Number Validator.

[![License](http://poser.pugx.org/governmentplates/uk-national-insurance-validator/license)](https://packagist.org/packages/governmentplates/uk-national-insurance-validator) [![Dependents](http://poser.pugx.org/governmentplates/uk-national-insurance-validator/dependents)](https://packagist.org/packages/governmentplates/uk-national-insurance-validator)

## Installation
```
composer require governmentplates/uk-national-insurance-validator
```

Requirements: PHP 7 or newer.

## Usage
```php
<?php

use NIValidator\NationalInsurance;

$ni = new NationalInsurance('QQ123456C');
$ni->validate();

//validate() returns true if a given number is valid, or false otherwise.
```

## How does it validate a N.I number?
This simple validator follows the logical rules for UK N.I. number formats, as seen in the [HMRC Insurance Manual](https://www.gov.uk/hmrc-internal-manuals/national-insurance-manual/nim39110).

## Is this safe? Is this going to leak my/or my users N.I. numbers?
Feel free to check the source code (located in the `src/` directory).

## License
GNU General Public License v3.0.
