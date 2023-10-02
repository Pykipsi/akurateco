<?php

declare(strict_types=1);

namespace Pykipsi\Akurateco\Sale\Input;

use Pykipsi\Akurateco\Traits\ValidationTrait;

class Card
{
    use ValidationTrait;

    private int $expYear;
    private int $number;
    private int $expMonth;
    private string $cvv2;

    public function __construct(
        int $number,
        int $expMonth,
        int $expYear,
        string $cvv2,
    ) {
        $this->setExpMonth($expMonth);
        $this->setExpYear($expYear);
        $this->setCvv2($cvv2);
        $this->number = $number;
        $this->checkCardExpDate($this->expYear, $this->expMonth);
    }

    public function getExpYear(): int
    {
        return $this->expYear;
    }

    public function getCvv2(): string
    {
        return $this->cvv2;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getExpMonth(): string
    {
        return ($this->expMonth < 10) ? "0$this->expMonth" : (string)$this->expMonth;
    }

    private function setExpMonth(int $expMonth): void
    {
        if ($this->checkMouth($expMonth)) {
            $this->expMonth = $expMonth;
        }
    }

    private function setExpYear(int $expYear): void
    {
        if ($this->checkCardExpYear($expYear)) {
            $this->expYear = $expYear;
        }
    }

    private function setCvv2(string $cvv2): void
    {
        if ($this->checkCardCvv2($cvv2)) {
            $this->cvv2 = $cvv2;
        }
    }
}