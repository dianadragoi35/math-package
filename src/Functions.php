<?php
namespace Functions;

class Functions
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
        for($i = 2; $i * $i < $num; $i ++) {
            if ($num % $i == 0) {
                $divisors[] = $i;
                if($i != $num/$i){
                    $divisors[] = $num/$i;
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
        if($num >= 0 && $num <= 12){
            $fact = 1;
            for($i = $num; $i >= 1; $i--) {
                $fact *= $i;
            }
            return $fact;
        }else{
            return "Wrong input.";
        }	
    }

    /**
     * Check if a number is prime
     * @param  int $num
     *
     * @return bool
     */
    public static function isPrimeNumber(int $num): bool
    {
        if(count(Functions::calcDivisors($num))){
            return false;
        }
        return true;	
    }

     /**
     * Check if a number is prime
     * @param  array $nums
     *
     * @return array
     */
    public static function calcPrimeNumbers(array $nums): array
    {
        $primes = array();
        foreach($nums as $num){
            if(Functions::isPrimeNumber($num)){
                $primes[] = $num;
            }
        }
        return $primes;	
    }

    // public static function to_xml(SimpleXMLElement $object, array $data){

    // }


}
