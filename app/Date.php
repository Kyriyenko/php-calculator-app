<?php

namespace App;

final class Date
{
    public function __construct(
        private readonly int $year,
        private readonly int $month,
        private readonly int $day,
    ){}

    public function getYear(): int
    {
        return $this->year;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * @param Date $date
     * @return bool
     */
    public function isDatesEqual(Date $date): bool
    {
        return $this->year === $date->getYear()
            && $this->month === $date->getMonth()
            && $this->day === $date->getDay();
    }

    /**
     * @param Date $date
     * @return \DateInterval|bool
     */
    public function getDifference(Date $date): \DateInterval|bool
    {
        $currentDateTime = new \DateTime("{$this->year}-{$this->month}-{$this->day}");
        $otherDateTime = new \DateTime("{$date->getYear()}-{$date->getMonth()}-{$date->getDay()}");

        return $currentDateTime->diff($otherDateTime);
    }

    /**
     * @param string $format
     * @return string
     */
    public function format(string $format): string
    {
        $currentDateTime = new \DateTime("{$this->year}-{$this->month}-{$this->day}");

        return $currentDateTime->format($format);
    }
}