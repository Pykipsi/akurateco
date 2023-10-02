<?php

declare(strict_types=1);

namespace Pykipsi\Akurateco\Traits;

use DateTime;
use Exception;
use Pykipsi\Akurateco\Exceptions\RequestValidationException;

trait ValidationTrait
{
    protected function checkOrderAmountFormat(string $orderAmount): bool
    {
        if (!preg_match('/^\d{1,4}\.\d{2}$/', $orderAmount)) {
            throw new RequestValidationException('Order Amount does not match format XXXX.XX');
        }

        return true;
    }

    protected function checkStringLength(string $value, int $permissibleLength, string $fieldName = ''): bool
    {
        if (strlen($value) > $permissibleLength) {
            throw new RequestValidationException("$fieldName length is invalid");
        }

        return true;
    }

    protected function checkMouth(int $month): bool
    {
        if ($month <= 12 && $month != 0) {
            return true;
        } else {
            throw new RequestValidationException(
                'Month does not match format XX or does not correspond to the interval from 1 to 12'
            );
        }
    }

    protected function checkCardExpYear(int $year): bool
    {
        if ($year < (int)date("Y")) {
            throw new RequestValidationException(
                'Card expired'
            );
        }

        return true;
    }

    protected function checkCardCvv2(string $cvv2): bool
    {
        if (!preg_match('/^\d{3,4}$/', $cvv2)) {
            throw new RequestValidationException('CVV2 must have 3-4 symbols');
        }

        return true;
    }

    protected function checkEmail(string $email): bool
    {
        if ($this->checkStringLength($email, 256, 'Email') && filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            return true;
        } else {
            throw new RequestValidationException('Email format error');
        }
    }

    protected function isValidIpAddress(string $ip): bool
    {
        return preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/', $ip) === 1;
    }

    protected function getValidDate(string $date): string
    {
        try {
            $dateTime = new DateTime($date);

            return date('Y-m-d', $dateTime->getTimestamp());
        } catch (Exception $e) {
            throw new RequestValidationException('Invalid date format');
        }
    }

    protected function checkCardExpDate(int $year, int $month): bool
    {
        $currentDate = new DateTime();
        $expirationDate = new DateTime("$year-$month-01");

        if ($expirationDate < $currentDate) {
            throw new RequestValidationException('The card has expired!');
        }

        return true;
    }
}