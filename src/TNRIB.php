<?php 
namespace besrourms\tnrib;

class TNRIB {
    private static $data = [
        ['code' => '01', 'name' => 'ATB', 'bic' => 'ATBK'],
        ['code' => '02', 'name' => 'BFT', 'bic' => 'BFTN'],
        ['code' => '03', 'name' => 'BNA', 'bic' => 'BNTE'],
        ['code' => '04', 'name' => 'ATTIJARI', 'bic' => 'BSTU'],
        ['code' => '05', 'name' => 'BT', 'bic' => 'BTBK'],
        ['code' => '07', 'name' => 'AMEN', 'bic' => 'CFCT'],
        ['code' => '08', 'name' => 'BIAT', 'bic' => 'BIAT'],
        ['code' => '10', 'name' => 'STB', 'bic' => 'STBK'],
        ['code' => '11', 'name' => 'UBCI', 'bic' => 'UBCI'],
        ['code' => '12', 'name' => 'UIB', 'bic' => 'UIBK'],
        ['code' => '14', 'name' => 'BH', 'bic' => 'BHBK'],
        ['code' => '16', 'name' => 'CITI', 'bic' => 'CITI'],
        ['code' => '17', 'name' => 'POSTE', 'bic' => 'LPTN'],
        ['code' => '20', 'name' => 'BTK', 'bic' => 'BTKO'],
        ['code' => '21', 'name' => 'TSB', 'bic' => 'TSIB'],
        ['code' => '23', 'name' => 'QNB', 'bic' => 'BTQI'],
        ['code' => '24', 'name' => 'BTE', 'bic' => 'BTEX'],
        ['code' => '25', 'name' => 'ZITOUNA', 'bic' => 'BZIT'],
        ['code' => '26', 'name' => 'BTL', 'bic' => 'ATLD'],
        ['code' => '28', 'name' => 'ABC', 'bic' => 'ABCO'],
        ['code' => '29', 'name' => 'BFPME', 'bic' => 'BFPM'],
        ['code' => '32', 'name' => 'ALBARAKA', 'bic' => 'BEIT'],
        ['code' => '47', 'name' => 'WIFAK', 'bic' => 'WKIB'],
        ['code' => '81', 'name' => 'ZITOUNAPAY', 'bic' => 'ETZP']
    ];

    private $value;
    private $valid;
    private $iban;
    private $bic;
    private $accountNumber;
    private $bankName;

    public function __construct($value) {
        $this->value = $value;
        $this->valid = $this->isValid();

        if ($this->valid) {
            $this->iban = $this->iban();
            $this->bic = $this->bic();
            $this->accountNumber = $this->accountNumber();
            $this->bankName = $this->bankName();
        }
    }

    private function getExistElementByCurrentCode() {
        return current(array_filter(self::$data, function ($item) {
            return $item['code'] == substr($this->value, 0, 2);
        }));
    }

    public function isValid() {
        $regex = '/^[0-9]{20}$/';
        return (
            preg_match($regex, $this->value) &&
            $this->getExistElementByCurrentCode() &&
            (intval(substr($this->value, -2)) === (97 - intval(bcmod(bcmul(substr($this->value, 0, 18) . '00', '1'), '97'))))
        );
    }

    public function iban() {
        return $this->isValid() ? 'TN59 ' . substr($this->value, 0, 2) . ' ' . substr($this->value, 2, 3) . ' ' . substr($this->value, 5, 13) . ' ' . substr($this->value, 18, 2) : null;
    }

    public function bic() {
        return $this->isValid() ? $this->getExistElementByCurrentCode()['bic'] . 'TNTT' : null;
    }

    public function accountNumber() {
        return $this->isValid() ? substr($this->value, 5, 13) : null;
    }

    public function bankName() {
        return $this->isValid() ? $this->getExistElementByCurrentCode()['name'] : null;
    }
}
