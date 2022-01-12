<?php

namespace App\Http\Controllers\API\Payment;

use Xendit\Xendit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class XenditController extends Controller
{
    private $token = 'xnd_public_production_8byWorUUdVxnctDDZW4k5ScGo1Q42KFyBJ35Al6f9ZSqnhi7bsF4TbEGwCT';

    public function getListVA()
    {
        Xendit::setApiKey($this->token);
        $getVABanks = \Xendit\VirtualAccounts::getVABanks();

        return response()->json([
            'data' => $getVABanks
        ])->setStatusCode(200);
    }
}
