<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\PlaylistService;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class UserSongStateController extends Controller
{
    // chứa các service để check trạng thái của song đối từng user
    protected $playlistService;
    protected $transactionService;

    public function __construct(PlaylistService $playlistService, TransactionService $transactionService)
    {
        $this->playlistService = $playlistService;
        $this->transactionService = $transactionService;
    }
}
