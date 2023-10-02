<?php

declare(strict_types=1);

namespace Pykipsi\Akurateco\Sale\Input;

use Pykipsi\Akurateco\Enums\CurrencyCode;
use Pykipsi\Akurateco\Traits\ValidationTrait;

class Order
{
    use ValidationTrait;

    private string $id;
    private string $amount;
    private string $description;
    private CurrencyCode $currency;

    public function __construct(
        string $id,
        string $amount,
        string $description,
        CurrencyCode $currency,
    ) {
        $this->setAmount($amount);
        $this->setId($id);
        $this->setDescription($description);
        $this->currency = $currency;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCurrency(): CurrencyCode
    {
        return $this->currency;
    }

    private function setAmount(string $amount): void
    {
        if ($this->checkOrderAmountFormat($amount)) {
            $this->amount = $amount;
        }
    }

    private function setId(string $id): void
    {
        if ($this->checkStringLength($id, 255, 'Order id')) {
            $this->id = $id;
        }
    }

    private function setDescription(string $description): void
    {
        if ($this->checkStringLength($description, 1024, 'Order description')) {
            $this->description = $description;
        }
    }
}