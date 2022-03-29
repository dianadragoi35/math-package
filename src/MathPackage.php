<?php
namespace Dianad\MathPackage;

class MathPackage
{

    /**
     * Returns an array of divisors for a given number
     * @param  int $num
     *
     * @return array
     */
    public static function calcDivisors(int $num): array
    {
        $divisors = array();
        if(is_numeric($num))
        {
             for($i = 2; $i * $i < $num; $i ++) {
                if ($num % $i == 0) {
                    $divisors[] = $i;
                    if($i != $num/$i){
                        $divisors[] = $num/$i;
                    }
                }
            }
        }
       
        return $divisors;
    }

    /**
     * Returns the factorial for a given input between 0 and 12
     * @param  int $num
     *
     * @return int
     */
    public static function calcFactorial(int $num): int
    {   
        if(is_numeric($num))
        {
            if($num >= 0 && $num <= 12){
                $fact = 1;
                for($i = $num; $i >= 1; $i--) {
                    $fact *= $i;
                }
                return $fact;
            }else{
                return 0;
            }	
        }
        return 0;
    }

    /**
     * Check if a number is prime
     * @param  int $num
     *
     * @return bool
     */
    public static function isPrimeNumber(int $num): bool
    {   
        if(is_numeric($num)){
            if(count(MathPackage::calcDivisors($num))){
                return false;
            }
            return true;
        }
        return false;
        	
    }

     /**
     * Takes the prime numbers from an array of integers
     * @param  array $nums
     *
     * @return array $primes
     */
    public static function filterPrimes(array $nums): array
    {
        $primes = array();
        foreach($nums as $num){
            if(is_numeric($num)){
                if(MathPackage::isPrimeNumber($num)){
                    $primes[] = $num;
                }
            }            
        }
        return $primes;	
    }

     /**
     * Takes an array with integers finds the prime numbers and returns the result as a XML document
     * @param array $nums
     * @param bool $saveXML, true for saving XML file, false for display XML
     *
     * @return result as XML document
     */
    public static function calcPrimeNumbers(array $nums, bool $saveXML = false){

        $nums = MathPackage::filterPrimes($nums);

        $xml = new DOMDocument('1.0',"UTF-8");
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;

        $primeNumbers   = $xml->createElement("primeNumbers");
        $primeAttribute = $xml->createAttribute('amount');
        $primeAttribute->value = "{".count($nums)."}";
        $primeNumbers->appendChild($primeAttribute);
        $xml->appendChild($primeNumbers);
        
        $result = $xml->createElement('result');
        $primeNumbers->appendChild($result);

        foreach ($nums as $key => $num) {
            if(is_numeric($num)){
                $number = $xml->createElement('number',"{".$num."}");
                $result->appendChild($number);
            }
        }
        
        if($saveXML){
            $xml->save('primeNumbers.xml');
        }else{
            return "<xmp>".$xml->saveXML()."</xmp>";
        }

    }


}
