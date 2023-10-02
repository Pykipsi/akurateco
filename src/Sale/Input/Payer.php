<?php

declare(strict_types=1);

namespace Pykipsi\Akurateco\Sale\Input;

use Pykipsi\Akurateco\Traits\ValidationTrait;
use Pykipsi\Akurateco\Enums\CountryCode;

class Payer
{
    use ValidationTrait;

    private string $firstName;
    private string $lastName;
    private string $address;
    private string $city;
    private string $zip;
    private string $email;
    private string $phone;
    private string $ip;
    private string $middleName;
    private string $birthDate;
    private string $address2;
    private string $state;
    private CountryCode $country;

    public function __construct(
        string $firstName,
        string $lastName,
        string $address,
        string $city,
        string $zip,
        string $email,
        string $phone,
        string $ip,
        CountryCode $country
    ) {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setAddress($address);
        $this->setCity($city);
        $this->setZip($zip);
        $this->setEmail($email);
        $this->setPhone($phone);
        $this->setIp($ip);
        $this->country = $country;
    }

    public function getAdditionalInformation(): array
    {
        $result = [];

        $notRequiredParams = [
            'payer_middle_name' => 'middleName',
            'payer_birth_date' => 'birthDate',
            'payer_address2' => 'address2',
            'payer_state' => 'state'
        ];

        $getters = [
            'middleName' => 'getMiddleName',
            'birthDate' => 'getBirthDate',
            'address2' => 'getAddress2',
            'state' => 'getState'
        ];

        foreach ($notRequiredParams as $nameInRequest => $param) {
            if (isset($this->$param)) {
                $method = $getters[$param];
                $result[$nameInRequest] = $this->$method();
            }
        }

        return $result;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getCountry(): CountryCode
    {
        return $this->country;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName ?? null;
    }

    public function getBirthDate(): ?string
    {
        return $this->birthDate ?? null;
    }

    public function getAddress2(): ?string
    {
        return $this->address2 ?? null;
    }

    public function getState(): ?string
    {
        return $this->state ?? null;
    }

    public function setMiddleName(string $middleName): void
    {
        if ($this->checkStringLength($middleName, 32, 'Payer middle name')) {
            $this->middleName = $middleName;
        }
    }

    public function setBirthDate(string $birthDate): void
    {
        $this->birthDate = $this->getValidDate($birthDate);
    }

    public function setAddress2(string $address2): void
    {
        if ($this->checkStringLength($address2, 255, 'Payer second address')) {
            $this->address2 = $address2;
        }
    }

    public function setState(string $state): void
    {
        if ($this->checkStringLength($state, 32, 'Payer state')) {
            $this->state = $state;
        }
    }

    private function setFirstName(string $firstName): void
    {
        if ($this->checkStringLength($firstName, 32, 'Payer first name')) {
            $this->firstName = $firstName;
        }
    }

    private function setLastName(string $lastName): void
    {
        if ($this->checkStringLength($lastName, 32, 'Payer last name')) {
            $this->lastName = $lastName;
        }
    }

    private function setAddress(string $address): void
    {
        if ($this->checkStringLength($address, 255, 'Payer address')) {
            $this->address = $address;
        }
    }

    private function setCity(string $city): void
    {
        if ($this->checkStringLength($city, 32, 'Payer city')) {
            $this->city = $city;
        }
    }

    private function setZip(string $zip): void
    {
        if ($this->checkStringLength($zip, 32, 'Payer zip')) {
            $this->zip = $zip;
        }
    }

    private function setEmail(string $email): void
    {
        if ($this->checkEmail($email)) {
            $this->email = $email;
        }
    }

    private function setPhone(string $phone): void
    {
        if ($this->checkStringLength($phone, 32, 'Payer phone')) {
            $this->phone = $phone;
        }
    }

    private function setIp(string $ip): void
    {
        if ($this->isValidIpAddress($ip)) {
            $this->ip = $ip;
        }
    }
}