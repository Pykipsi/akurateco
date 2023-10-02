<?php

declare(strict_types=1);

namespace Pykipsi\Akurateco\Sale;

use Pykipsi\Akurateco\Exceptions\InvalidResponseStructureException;
use Pykipsi\Akurateco\Sale\Input\SaleRequest;
use Pykipsi\Akurateco\Sale\Output\SaleResponse;

interface ApiClientInterface
{
    /**
     * @param SaleRequest $request
     * @return SaleResponse
     *
     * @throws InvalidResponseStructureException
     */
    public function performRequest(SaleRequest $request): SaleResponse;
}