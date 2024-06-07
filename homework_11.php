<?php
function isPrime($number)
{
    if ($number <= 1) {
        return false;
    }
    $i = 2;
    while ($i <= sqrt($number)) {
        if ($number % $i === 0) {
            return false;
        }
        $i++;
    }
    return true;
}

function findingPrimeNumbersFromArray($arr)
{
    $primeNumbers = array_filter($arr, function ($value) {
        return is_numeric($value) && isPrime($value);
    });
    return array_values($primeNumbers);
}

$arrayOfNumbers = array(12, 17, 23, 8, 31, 45, 53, 60, 71, 89, 97, 101);

$primeNumbers = findingPrimeNumbersFromArray($arrayOfNumbers);

echo "Found prime numbers from the array are: ";
echo implode(", ", $primeNumbers);
?>