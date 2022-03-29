
# [Installation](https://packagist.org/packages/dianad/math-package)

```bash
$ composer require dianad/math-package:dev-master
```

# Usage

`MathPackage` Class

## calcDivisors function
Takes an integer and returns an array with all of the integer's divisors (except for 1 and the number itself). Prime numbers are not allowed.
* param `int`
* returns `array` with divisors

## calcFactorial function
Calculates and returns the factorial for a given input. Input below 0 and above 12 is not allowed.
* param `int`
* returns `int`

## calcPrimeNumbers function
Takes an array with integers finds the prime numbers and returns the result as 
a XML document which each found prime number in a ‘number’ node
* param 1 `array` with integers
* param 2 `bool` $saveXML, true for saving XML file, false for display XML
* returns result as `XML document`

## isPrimeNumber function
Check if a number is prime
* param `int`
* returns `bool`

## filterPrimes function
Takes the prime numbers from an array of integers
* param `array` on integers
* returns `array` with primes

# Example

```php
<?php

require_once './vendor/autoload.php';
use Dianad\MathPackage\MathPackage;

$num       = 64;
$factorial = 12;
$arrayNums = [2,3,4,5,6,7,11,12,13,17,19,23,29,30,31,37,40,41,43,47,53,59,60,61,67,71,73,74,79,83,89,97,101,102,'asd'];

print_r("<br><br>Divisors of $num: ");
print_r(MathPackage::calcDivisors( $num ));

print_r("<br><br>Factorial of $factorial: ");
print_r(MathPackage::calcFactorial( $factorial ));

print_r("<br><br>The prime numbers from [".implode(",", $arrayNums)."]<br>");
print_r(MathPackage::calcPrimeNumbers( $arrayNums, $saveXML = false ));

if($saveXML){
    print_r("Result in primeNumbers.xml file.");
}

?>

```
