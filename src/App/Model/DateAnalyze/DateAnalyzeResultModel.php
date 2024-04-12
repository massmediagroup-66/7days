<?php

namespace App\Model\DateAnalyze;

class DateAnalyzeResultModel
{
    private int $zoneOffset;
    private int $februaryDays;
    private string $monthName;
    private int $monthDays;

    public function getZoneOffset(): int
    {
        return $this->zoneOffset;
    }

    public function getZoneOffsetWithSign(): string
    {
        return $this->zoneOffset <= 0 ? $this->zoneOffset : '+' . $this->zoneOffset;
    }

    public function setZoneOffset(int $zoneOffset): self
    {
        $this->zoneOffset = $zoneOffset;

        return $this;
    }

    public function getFebruaryDays(): int
    {
        return $this->februaryDays;
    }

    public function setFebruaryDays(int $februaryDays): self
    {
        $this->februaryDays = $februaryDays;

        return $this;
    }

    public function getMonthName(): string
    {
        return $this->monthName;
    }

    public function setMonthName(string $monthName): self
    {
        $this->monthName = $monthName;

        return $this;
    }

    public function getMonthDays(): int
    {
        return $this->monthDays;
    }

    public function setMonthDays(int $monthDays): self
    {
        $this->monthDays = $monthDays;

        return $this;
    }
}
