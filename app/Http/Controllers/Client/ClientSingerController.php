<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\PlaylistService;
use App\Services\SingerService;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class ClientSingerController extends UserSongStateController
{
    //
    private $singerService;

    public function __construct(SingerService $singerService, PlaylistService $playlistService, TransactionService $transactionService)
    {
        parent::__construct($playlistService, $transactionService);
        $this->singerService = $singerService;
    }
    //
    public function index()
    {
        //
        $singers = $this->singerService->getPaginate($limit = PER_PAGE_OPTION_ONE);

        return view('client.singer_list', compact('singers'));
    }

    public function show($id)
    {
        //
        $singer = $this->singerService->getById($id, 'songs');

        $playlist = $this->playlistService->getAllUserSongId();

        $transactions = $this->transactionService->getAllUserSongId();

        return view('client.singer_songs_list', compact('singer', 'playlist', 'transactions'));
    }
}
