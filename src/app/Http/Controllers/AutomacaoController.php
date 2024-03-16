<?php

namespace App\Http\Controllers;

use App\Dto\ErpDTO;
use App\Services\IntegracaoService;
use Illuminate\Http\JsonResponse;

class AutomacaoController extends Controller
{
    /**
     * @throws \Exception
     */
    public function __invoke(): JsonResponse
    {
        app(IntegracaoService::class)->execute(new ErpDTO(companyUuid: '302555d8-43b1-4776-a7cc-4ed97ca227c7'));
        return response()->json([
            'result' => [
                'success' => true,
                'message' => 'Ok',
                'messages' => ''
            ]
        ]);
    }
}
