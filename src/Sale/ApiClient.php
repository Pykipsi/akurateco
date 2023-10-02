<?php

declare(strict_types=1);

namespace Pykipsi\Akurateco\Sale;

use Pykipsi\Akurateco\Exceptions\CurlTransferException;
use Pykipsi\Akurateco\Exceptions\InvalidResponseStructureException;
use Pykipsi\Akurateco\Sale\Input\SaleRequest;
use Pykipsi\Akurateco\Sale\Output\SaleResponse;

class ApiClient implements ApiClientInterface
{
    private const URL = 'https://dev-api.rafinita.com/post';

    public function performRequest(SaleRequest $request): SaleResponse
    {
        $data = $request->getRequest();

        $postData = http_build_query($data);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, self::URL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new CurlTransferException('CURL error ' . curl_error($ch));
        }

        curl_close($ch);

        return $this->parseResponse($response);
    }

    private function parseResponse(string $response): SaleResponse
    {
        $body = json_decode($response, true);

        $this->validateResponseOrException($body);

        return $this->getResponseWithAdditionalInformation($body);
    }

    private function validateResponseOrException(array $responseBody): void
    {
        $requiredFields = [
            'action',
            'result',
            'status',
            'order_id',
            'trans_id',
            'trans_date',
            'descriptor',
            'amount',
            'currency'
        ];

        foreach ($requiredFields as $field) {
            if (!array_key_exists($field, $responseBody)) {
                throw new InvalidResponseStructureException(
                    "Missing '{$field}' in decoded successful response: " .
                    var_export($responseBody, true)
                );
            }
        }
    }

    private function getResponseWithAdditionalInformation(array $responseBody): SaleResponse
    {
        $result = new SaleResponse(
            $responseBody['action'],
            $responseBody['result'],
            $responseBody['status'],
            $responseBody['order_id'],
            $responseBody['trans_id'],
            $responseBody['trans_date'],
            $responseBody['descriptor'],
            $responseBody['amount'],
            $responseBody['currency']
        );

        $additionalFields = [
            'recurring_token' => 'recurringToken',
            'decline_reason' => 'declineReason',
            'redirect_url' => 'redirectUrl',
            'redirect_params' => 'redirectParams',
            'redirect_method' => 'redirectMethod'
        ];

        foreach ($additionalFields as $fieldName => $setter) {
            if (array_key_exists($fieldName, $responseBody)) {
                $result->$setter($responseBody[$fieldName]);
            }
        }

        return $result;
    }
}