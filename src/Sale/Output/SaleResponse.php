<?php

declare(strict_types=1);

namespace Pykipsi\Akurateco\Sale\Output;

class SaleResponse
{
    private $redirectParams;
    private ?string $recurringToken;
    private ?string $declineReason;
    private ?string $redirectUrl;
    private ?string $redirectMethod;

    public function __construct(
        private string $action,
        private string $result,
        private string $status,
        private string $orderId,
        private string $transId,
        private string $transDate,
        private string $descriptor,
        private string $amount,
        private string $currency
    ) {
    }

    public function setNonRepeatingParameters(array $responseBody): void
    {
        $nonRepeatingParams = [
            'recurring_token' => 'recurringToken',
            'decline_reason' => 'declineReason',
            'redirect_url' => 'redirectUrl',
            'redirect_params' => 'redirectParams',
            'redirect_method' => 'redirectMethod'
        ];

        foreach ($nonRepeatingParams as $nameInResponse => $param) {
            if (!empty($responseBody[$nameInResponse])) {
                $this->$param = $responseBody[$nameInResponse];
            }
        }
    }

    public function getRecurringToken(): ?string
    {
        return $this->recurringToken;
    }

    public function getDeclineReason(): ?string
    {
        return $this->declineReason;
    }

    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }

    public function getRedirectParams()
    {
        return $this->redirectParams;
    }

    public function getRedirectMethod(): ?string
    {
        return $this->redirectMethod;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getResult(): string
    {
        return $this->result;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getTransId(): string
    {
        return $this->transId;
    }

    public function getTransDate(): string
    {
        return $this->transDate;
    }

    public function getDescriptor(): string
    {
        return $this->descriptor;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setRecurringToken(?string $recurringToken): void
    {
        $this->recurringToken = $recurringToken;
    }

    public function setDeclineReason(?string $declineReason): void
    {
        $this->declineReason = $declineReason;
    }

    public function setRedirectUrl(?string $redirectUrl): void
    {
        $this->redirectUrl = $redirectUrl;
    }

    public function setRedirectParams($redirectParams): void
    {
        $this->redirectParams = $redirectParams;
    }

    public function setRedirectMethod(?string $redirectMethod): void
    {
        $this->redirectMethod = $redirectMethod;
    }
}