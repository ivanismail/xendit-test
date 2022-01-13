<?php

namespace App\Http\Controllers\API\Payment;

use Xendit\Xendit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class XenditController extends Controller
{
    private $token = 'xnd_development_Hsu9PXfGESzi3Gr94Fe1vXSgrExffn65XG9aS4Wrh66hEc9bSk2HzXFyzmpl';
    // private $token = 'xnd_development_Fvb4acvM32jIQMa8K1FtyC6wXfwY7wsJLWAfuhNjsSLNiJpy5EdDQyCB40n9i9';

    public function getListVA()
    {
        Xendit::setApiKey($this->token);
        $getVABanks = \Xendit\VirtualAccounts::getVABanks();

        return response()->json([
            'data' => $getVABanks
        ])->setStatusCode(200);
    }

    public function createVA(Request $request)
    {
        Xendit::setApiKey($this->token);
        $params = [ 
            "external_id" => \uniqid(),
            "bank_code" => $request->bank,
            "name" => $request->name,
            "expected_amount" => $request->amount,
            "is_closed" => true

          ];
        
        $createVA = \Xendit\VirtualAccounts::create($params);

        return response()->json([
            'data' => $createVA
        ])->setStatusCode(200);
    }
}
