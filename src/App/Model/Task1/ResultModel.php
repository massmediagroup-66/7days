<?php

namespace App\Model\Task1;

class ResultModel
{
    private int $a;
    private int $b;
    private string $c;
    private int $d;

    public function getA(): int
    {
        return $this->a;
    }

    public function getAFormatted(): string
    {
        return $this->a <= 0 ? $this->a : '+' . $this->a;
    }

    public function setA(int $a): self
    {
        $this->a = $a;

        return $this;
    }

    public function getB(): int
    {
        return $this->b;
    }

    public function setB(int $b): self
    {
        $this->b = $b;

        return $this;
    }

    public function getC(): string
    {
        return $this->c;
    }

    public function setC(string $c): self
    {
        $this->c = $c;

        return $this;
    }

    public function getD(): int
    {
        return $this->d;
    }

    public function setD(int $d): self
    {
        $this->d = $d;

        return $this;
    }
}
