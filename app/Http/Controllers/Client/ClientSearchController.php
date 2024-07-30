<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\PlaylistService;
use App\Services\SingerService;
use App\Services\SongService;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class ClientSearchController extends UserSongStateController
{
    //
    private $singerService;
    private $songService;

    public function __construct(
        SingerService $singerService,
        SongService $songService,
        PlaylistService $playlistService,
        TransactionService $transactionService
    ) {
        parent::__construct($playlistService, $transactionService);
        $this->singerService = $singerService;
        $this->songService = $songService;
    }

    public function search(Request $request)
    {
        $singers = $this->singerService->getSingerFilterByName(trim($request->query('filter')));

        $songs = $this->songService->getSongFilterByName(trim($request->query('filter')));

        $playlist = $this->playlistService->getAllUserSongId();

        $transactions = $this->transactionService->getAllUserSongId();

        return view('client.search', compact('singers', 'songs', 'playlist', 'transactions'));
    }
}
