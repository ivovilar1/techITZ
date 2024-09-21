<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class CnpjService
{
    /**
     * Consulta o CNPJ usando a API Brasil.
     *
     * @param string $cnpj
     * @return array
     * @throws RequestException|ConnectionException
     */
    public function search(string $cnpj): array
    {
        $cnpjFormatted = formatCNPJ($cnpj);

        $url = config('services.brasil_api.base_url') . '/cnpj/v1/' . $cnpjFormatted;
        $response = Http::acceptJson()->get($url);
        $response->throw();

        return $response->json();
    }
}
