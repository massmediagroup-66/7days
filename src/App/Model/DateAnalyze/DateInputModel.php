<?php

namespace App\Model\DateAnalyze;

use Symfony\Component\Validator\Constraints as Assert;

class DateInputModel
{
    /**
     * @Assert\NotBlank(message="Date should not be blank.")
     * @Assert\Date(message="Invalid date format. It should be Y-m-d.")
     */
    private string $date;

    /**
     * @Assert\NotBlank(message="Timezone should not be blank.")
     * @Assert\Timezone(message="Invalid timezone. It should be like Europe/London, Asia/Tokyo")
     */
    private string $timezone;

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }
}
