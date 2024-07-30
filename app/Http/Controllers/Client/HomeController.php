<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\AlbumService;
use App\Services\CategoryService;
use App\Services\PlaylistService;
use App\Services\SingerService;
use App\Services\SongService;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class HomeController extends UserSongStateController
{
    //
    private $songService;
    private $singerService;
    private $albumService;

    public function __construct(
        SongService $songService,
        SingerService $singerService,
        AlbumService $albumService,
        PlaylistService $playlistService,
        TransactionService $transactionService
    ) {
        parent::__construct($playlistService, $transactionService);
        $this->songService = $songService;
        $this->singerService = $singerService;
        $this->albumService = $albumService;
    }

    public function index()
    {
        $songs = $this->songService->getNewSong(NEW_SONG_NUMBER);

        $albums = $this->albumService->getNewAlbum(NEW_ALBUM_NUMBER);

        $singers = $this->singerService->getNewSinger(NEW_SINGER_NUMBER);

        $playlist = $this->playlistService->getAllUserSongId();

        $transactions = $this->transactionService->getAllUserSongId();

        return view('client.home.home', compact('songs', 'albums', 'singers', 'playlist', 'transactions'));
    }
}
