# TNRIB PHP
[![GitHub license](https://img.shields.io/github/license/BesrourMS/tnrib-php?style=flat-square)](https://github.com/BesrourMS/tnrib-php/blob/main/LICENSE)

BBAN Checker Tunisia, PHP implementation for [TNRIB.js](https://github.com/McZen-Technologies/TNRIB) (Vérificateur de RIB Tunisie)

## Installation

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