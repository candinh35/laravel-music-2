<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\RechargeRequest;
use App\Services\VnPayService;
use Exception;
use Illuminate\Http\Request;

class ClientRechargeController extends Controller
{
    //
    private $vnPayServiceService;

    public function __construct(VnPayService $vnPayServiceService)
    {
        $this->vnPayServiceService = $vnPayServiceService;
    }

    public function vnpayPayment(RechargeRequest $request)
    {
        try {
            $this->vnPayServiceService->vnpay($request->money);
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }

    public function rechargeVnPay(Request $request)
    {
        try {
            $this->vnPayServiceService->increaseUserWallet($request);

            return redirect()->route('client.profile')->with('success', __('messages.recharge_success'));
        } catch (Exception $e) {
            return redirect()->route('client.profile')->withErrors([
                'error' => $e->getMessage(),
            ]);
        }
    }
}
