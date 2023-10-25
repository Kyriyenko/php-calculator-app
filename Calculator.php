<?php

class Calculator
{

    private float|int $firstNumber;
    private float|int $secondNumber;

    public function __construct(float|int $firstNumber = 0, float|int $secondNumber = 0)
    {
        $this->firstNumber = $firstNumber;
        $this->secondNumber = $secondNumber;
    }


    public function addition(): float|int
    {
        return $this->firstNumber + $this->secondNumber;
    }

    public function subtraction(): float|int
    {
        return $this->firstNumber - $this->secondNumber;
    }

    public function multiplication(): float|int
    {
        return $this->firstNumber * $this->secondNumber;
    }

    public function division(): float|int
    {
        if ($this->secondNumber == 0) {
            throw new InvalidArgumentException('You cannot divide by zero.');
        }
        return $this->firstNumber / $this->secondNumber;
    }
}