<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\TransactionService;
use Exception;
use Illuminate\Http\Request;

class ClientTransactionController extends Controller
{
    //
    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    // update user transaction
    public function update($id)
    {
        try {
            $this->transactionService->update($id);
            return back();
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }
}
