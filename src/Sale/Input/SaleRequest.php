<?php

declare(strict_types=1);

namespace Pykipsi\Akurateco\Sale\Input;

use Pykipsi\Akurateco\Traits\ValidationTrait;

class SaleRequest
{
    use ValidationTrait;

    private const ACTION = 'SALE';

    private bool $recurringInit = false;
    private bool $auth = false;
    private string $termUrl3ds;
    private string $hash;
    private string $clientKey;
    private string $channelId;
    private Order $order;
    private Card $card;
    private Payer $payer;

    public function __construct(
        string $clientKey,
        string $termUrl3ds,
        string $hash,
        Order $order,
        Card $card,
        Payer $payer,

    ) {
        $this->card = $card;
        $this->payer = $payer;
        $this->setTermUrl3ds($termUrl3ds);
        $this->clientKey = $clientKey;
        $this->hash = $hash;
        $this->order = $order;
    }

    public function getRequest(): array
    {
        $request = [
            'action' => self::ACTION,
            'client_key' => $this->clientKey,
            'order_id' => $this->order->getId(),
            'order_amount' => $this->order->getAmount(),
            'order_currency' => $this->order->getCurrency()->value,
            'order_description' => $this->order->getDescription(),
            'card_number' => $this->card->getNumber(),
            'card_exp_month' => $this->card->getExpMonth(),
            'card_exp_year' => $this->card->getExpYear(),
            'card_cvv2' => $this->card->getCvv2(),
            'payer_first_name' => $this->payer->getFirstName(),
            'payer_last_name' => $this->payer->getLastName(),
            'payer_address' => $this->payer->getAddress(),
            'payer_country' => $this->payer->getCountry()->value,
            'payer_city' => $this->payer->getCity(),
            'payer_zip' => $this->payer->getZip(),
            'payer_email' => $this->payer->getEmail(),
            'payer_phone' => $this->payer->getPhone(),
            'payer_ip' => $this->payer->getIp(),
            'term_url_3ds' => $this->termUrl3ds,
            'hash' => $this->hash
        ];

        $notRequiredParams = $this->getNotRequiredParams();

        return array_merge($notRequiredParams, $request);
    }

    public function setChannelId(string $channelId): void
    {
        if($this->checkStringLength($channelId, 16, 'Channel id')) {
            $this->channelId = $channelId;
        }
    }

    public function setRecurringInit(bool $recurringInit): void
    {
        $this->recurringInit = $recurringInit;
    }

    public function setAuth(bool $auth): void
    {
        $this->auth = $auth;
    }

    public function getChannelId(): string
    {
        return $this->channelId;
    }

    private function getRecurringInit(): string
    {
        return $this->getBoolFieldAsString($this->recurringInit);
    }

    private function getAuth(): string
    {
        return $this->getBoolFieldAsString($this->auth);
    }

    private function setTermUrl3ds(string $termUrl3ds): void
    {
        if ($this->checkStringLength($termUrl3ds, 1024, '3D-Secure returned url')){
            $this->termUrl3ds = $termUrl3ds;
        }
    }

    private function getNotRequiredParams(): array
    {
        $result = [];

        $notRequiredParams = [
            'channel_id' => 'channelId',
            'recurring_init' => 'recurringInit',
            'auth' => 'auth'
        ];

        $getters = [
            'channelId' => 'getChannelId',
            'recurringInit' => 'getRecurringInit',
            'auth' => 'getAuth'
        ];

        foreach ($notRequiredParams as $nameInRequest => $param) {
            if (isset($this->$param)) {
                $method = $getters[$param];
                $result[$nameInRequest] = $this->$method();
            }
        }

        $payerAdditionalInformation = $this->payer->getAdditionalInformation();

        return array_merge($result, $payerAdditionalInformation);
    }

    private function getBoolFieldAsString(bool $condition): string
    {
        return ($condition === true) ? 'Y' : 'N';
    }
}