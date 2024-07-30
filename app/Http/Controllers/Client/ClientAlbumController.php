<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\AlbumService;
use App\Services\PlaylistService;
use App\Services\SingerService;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class ClientAlbumController extends UserSongStateController
{
    private $albumService;

    public function __construct(AlbumService $albumService, PlaylistService $playlistService, TransactionService $transactionService)
    {
        parent::__construct($playlistService, $transactionService);
        $this->albumService = $albumService;
    }
    //
    public function index()
    {
        //
        $albums = $this->albumService->getPaginate($limit = PER_PAGE_OPTION_ONE);


        return view('client.album_list', compact('albums'));
    }

    public function show($id)
    {
        $album = $this->albumService->getById($id, 'songs');

        $playlist = $this->playlistService->getAllUserSongId();

        $transactions = $this->transactionService->getAllUserSongId();

        return view('client.album_songs_list', compact('album', 'playlist', 'transactions'));
    }
}
