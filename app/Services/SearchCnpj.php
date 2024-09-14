<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class SearchCnpj
{
    public static function execute(string $cnpj): array
    {
        $cnpjFormated = validateAndFormatCNPJ($cnpj);

        if ($cnpjFormated === false) {
            throw new \Exception("CNPJ Invalido");
        }

        try {
            $response = Http::acceptJson()
                ->get(config('services.brasil_api.base_url') . '/cnpj/v1/' . $cnpjFormated);
            $response->throw();
            $response->json();
        } catch (RequestException $e) {
            $error = $e->response->json();
            $message = $error['message'] ?? 'Algo inesperado aconteceu';
            throw new \Exception($message);
        }
        return [
            'name' => $response['nome_fantasia'],
            'description' => $response['cnae_fiscal_descricao']
        ];
    }
}
