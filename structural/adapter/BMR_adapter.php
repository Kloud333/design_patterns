<?php

interface BMRImpCalc
{
    public function BMR($height, $weight, $age);
}

class BMRCalc implements BMRImpCalc
{

    public function BMR($height, $weight, $age)
    {
        return (66 + (6.2 * $weight) + (12.7 * $height) - (6.7 * $age));
    }
}


interface BMRMetrCalc
{
    public function metcicBMR($height, $weight, $age): String;
}

class BMRCalcAdapter implements BMRMetrCalc
{

    public $adapt;

    public function __construct()
    {
        $this->adapt = new BMRCalc;
    }

    public function metcicBMR($height, $weight, $age): String
    {
        $MHeight = $height * 3.28;
        $MWeight = $weight * 2.28;
        $result = $this->adapt->BMR($MHeight, $MWeight, $age);

        return 'BMR ' . $result;
    }
}

class Person
{
    public function checkBMR(BMRMetrCalc $metrCalc)
    {
        echo $metrCalc->metcicBMR(1.84, 74, 26);
    }
}

$person = new Person();

$person->checkBMR(new BMRCalcAdapter());
