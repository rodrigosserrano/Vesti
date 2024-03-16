<?php

namespace App\Services;

use App\Dto\ErpDTO;
use App\Dto\IDto;
use App\Dto\ProductDTO;
use App\Dto\VariationsDTO;
use App\Events\CalledApi;
use App\Facades\Repository;
use Illuminate\Support\Benchmark;
use Illuminate\Support\LazyCollection;

final class IntegracaoService implements IService
{

    /**
     * @param ?ErpDTO $data
     * @return void
     * @throws \Exception
     */
    public function execute(?IDto $data = null): void
    {
        /**
         * Também não é o ideal
         */
        $products = Repository::erp()->products(perPage: 5000);
        $variations = Repository::erp()->variations(perPage: 5000);

        if ($products->isEmpty() || $variations->isEmpty()) {
            return;
        }

        $related = [];
        /**
         * com certeza não é o ideal
         */
        foreach ($products as $product) {
            $related[$product['referencia']] = $product;
            foreach ($variations->chunk(2000) as $variationsChunked) {
                foreach ($variationsChunked as $variation) {
                    if (str_contains($variation['variacao'], $product['referencia'])) {
                        $related[$product['referencia']]['variations'][] = $variation;
                    }
                }
            }
        }
        event(new CalledApi($data->companyUuid, $related));
    }
}
