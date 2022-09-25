<?php

/*
* Simple and fast UK National Insurance Number Validator
*
* @author Dominic H.
* 
* @link https://dominic.sk
* @link https://github.com/GovernmentPlates/PHP-NIValidator
*
* @license GNU General Public License v3.0
*/

namespace NIValidator;

class NationalInsurance
{

    protected $insuranceNumber;


    public function __construct($insuranceNumber)
    {
        $this->insuranceNumber = $insuranceNumber;
    }


    /*
    * Main validator function
    * @return bool
    */
    public function validate() : bool
    {
        if (!$this->checkLength()) {
            return false;
        }

        if (!$this->checkPrefix()) {
            return false;
        }

        if (!$this->checkLastPartOfPrefix()) {
            return false;
        }

        if (!$this->checkNumericBody()) {
            return false;
        }

        if (!$this->checkSuffix()) {
            return false;
        }

        return true;
    }


    /*
    * Check if the length of the given number is 9 characters long
    * @return bool
    */
    private function checkLength() : bool
    {
        $length = strlen($this->insuranceNumber);

        if ($length != 9) {
            return false;
        }

        return true;
    }


    /*
    * Check if the first two of the characters (prefix) are valid
    * The prefix must not contain any forbidden letters
    * @return bool
    */
    private function checkPrefix() : bool
    {
        //Get the first two characters of the NI number
        $prefix = substr($this->insuranceNumber, 0, 2);

        $forbiddenLettersPattern = "/[^!@#$%^&*]*(BG|GB|NK|KN|TN|NT|ZZ|D|F|I|Q|U|V)[^!@#$%^&*]*/i";

        if (preg_match($forbiddenLettersPattern, $prefix)) {
            return false;
        }

        return true;
    }

    
    /*
    * Check if the last character of the prefix does not contain a 'O'
    * @return bool
    */
    private function checkLastPartOfPrefix() : bool
    {
        $prefixLast = substr($this->insuranceNumber, 1, 1);

        $prefixLastForbiddenPattern = "/[^!@#$%^&*]*(O)[^!@#$%^&*]*/i";

        if (preg_match($prefixLastForbiddenPattern, $prefixLast)) {
            return false;
        }

        return true;
    }


    /*
    * Check if the body of the NI number is numeric
    * @return bool
    */
    private function checkNumericBody() : bool
    {
        $numericBody = substr($this->insuranceNumber, 2, 6);

        if (!is_numeric($numericBody)) {
            return false;
        }

        return true;
    }


    /*
    * Check if the last character (suffix) is valid
    * The suffix must be with the range of A to D
    * @return bool
    */
    private function checkSuffix() : bool
    {
        $suffix = substr($this->insuranceNumber, 8, 1);

        //If the suffix is not A, B, C or D return false
        if (!preg_match("/[^!@#$%^&*]*(A|B|C|D)[^!@#$%^&*]*/i", $suffix)) {
            return false;
        }

        return true;
    }

}

?>