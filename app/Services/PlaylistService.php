<?php

namespace App\Services;

use App\Models\User;
use App\Services;
use Illuminate\Support\Facades\Auth;

class PlaylistService
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllUserSongId()
    {
        if($this->user->isClient()){
            return User::find(Auth::id())->songs()->pluck('song_id')->toArray();
        }
    }

    public function index($limit)
    {
        if($this->user->isClient()){
            return User::find(Auth::id())->songs()->paginate($limit);
        }
    }

    public function update($id)
    {
        if($this->user->isClient()){
            return User::find(Auth::id())->songs()->toggle($id);
        }
    }
}
