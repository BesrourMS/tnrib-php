# TNRIB PHP
[![GitHub license](https://img.shields.io/github/license/BesrourMS/tnrib-php?style=flat-square)](https://github.com/BesrourMS/tnrib-php/blob/main/LICENSE)

BBAN Checker Tunisia, PHP implementation for [TNRIB.js](https://github.com/McZen-Technologies/TNRIB) (Vérificateur de RIB Tunisie)

The TNRIB PHP Package is a library for validating and retrieving information from Tunisian National Bank numbers. It provides a set of utility methods to validate BBAN numbers, extract IBAN, BIC, Account Number, and Bank Name associated with a valid BBAN.

## Installation

You can install the TNRIB PHP Package using Composer. Run the following command in your project directory:

```bash
composer require besrourms/tnrib-php
```

## Usage

```php
include './vendor/autoload.php';
use besrourms\tnrib\TNRIB;
	
$tnrib = new TNRIB('07040005810111129653');
if ($tnrib->isValid()) {
	echo 'IBAN: ' . $tnrib->iban() . '<br>';
	echo 'BIC: ' . $tnrib->bic() . '<br>';
	echo 'Account Number: ' . $tnrib->accountNumber() . '<br>';
	echo 'Bank Name: ' . $tnrib->bankName() . '<br>';
} else {
	echo 'Invalid BBAN';
}
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.