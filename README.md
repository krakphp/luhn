# Luhn

Luhn mod10 algorithms

## Install

```
composer require krak/luhn
```

## Usage

```php
<?php

use function Krak\Luhn\luhn_validate,
    Krak\Luhn\luhn_checksum;

$ccnumber = '79927398713';

var_dump(luhn_validate($ccnumber));
// bool(true)

var_dump(luhn_checksum(substr($ccnumber, 0, -1)));
// int(67)
```

## API

```
bool luhn_validate($number_string);
int luhn_checksum($number_string);
```

`luhn_validate` takes a numeric string and performs a mod10 check on it and verifies if it matches or not.

`luhn_checksum` takes a numeric string and returns the luhn checksum of it. This is used internally by the `luhn_validate` to compare a string with its last digit.


## Test

You can run tests with peridot using make

```
make test
```
