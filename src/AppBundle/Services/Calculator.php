<?php

namespace AppBundle\Services;

class Calculator
{
    public function add($a, $b)
    {
        return $a + $b;
    }

    public function times($a, $b)
    {
        return $a * $b;
    }

    public function substract($a, $b)
    {
        return $a - $b;
    }

    public function divide($a, $b)
    {
        return $a / $b;
    }

    public function square($a, $b)
    {
        return $a ** $b;
    }
}
