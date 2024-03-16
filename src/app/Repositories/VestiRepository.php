<?php

namespace App\Repositories;

use App\Dto\ProductDTO;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Exception;
use Ramsey\Uuid\Uuid;

class VestiRepository
{
    public function __construct()
    {
        Http::fake([
            'https://integracao.meuvesti.com/api/v1/products/company/302555d8-43b1-4776-a7cc-4ed97ca227c7' => Http::response([
                "result" => [
                    "success" => true,
                    "message" => "Ok",
                    "messages" => ""
                ],
                "statusCode" => 200
            ]),
            'https://integracao.meuvesti.com/api/v1/products/company/302555d8-43b1-4776-a7cc-4ed97ca227c8' => Http::response([
                "result" => [
                    "success" => false,
                    "message" => "Error",
                    "messages" => ""
                ],
                "statusCode" => 401
            ]),
        ]);
    }

    public function addProduct(string $companyuuid, array $product): Collection
    {
        try {
            return Http::post("https://integracao.meuvesti.com/api/v1/products/company/{$companyuuid}", $product)
                ->throw()
                ->collect();
        } catch (Exception $e) {
            throw $e;
        }
    }

}
