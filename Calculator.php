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


    /**
     * @return float|int
     */
    public function addition(): float|int
    {
        return $this->firstNumber + $this->secondNumber;
    }

    /**
     * @return float|int
     */
    public function subtraction(): float|int
    {
        return $this->firstNumber - $this->secondNumber;
    }

    /**
     * @return float|int
     */
    public function multiplication(): float|int
    {
        return $this->firstNumber * $this->secondNumber;
    }

    /**
     * @return float|int
     *
     * NOTE: you can't divide by zero.
     */
    public function division(): float|int
    {
        if ($this->secondNumber == 0) {
            throw new InvalidArgumentException('You cannot divide by zero.');
        }
        return $this->firstNumber / $this->secondNumber;
    }
}