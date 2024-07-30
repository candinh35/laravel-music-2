<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\PlaylistService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientPlaylistController extends UserSongStateController
{
    public function index()
    {
        $songs = $this->playlistService->index($limit = PER_PAGE_OPTION_ONE);

        $transactions = $this->transactionService->getAllUserSongId();

        return view('client.playlist', compact('songs', 'transactions'));
    }

    // update user playlist
    public function update($id)
    {
        try {
            $this->playlistService->update($id);
            return back();
        } catch (Exception $e) {
            return back()->withErrors(__('messages.error_common'));
        }
    }
}
