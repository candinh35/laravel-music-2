<?php

namespace App\Services;

use App\Models\Song;
use App\Models\User;
use App\Services;
use Illuminate\Support\Facades\Auth;

class TransactionService
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllUserSongId()
    {
        if($this->user->isClient()){
            return User::find(Auth::id())->transactionSongs()->pluck('song_id')->toArray();
        }
    }

    public function index($limit)
    {
        if($this->user->isClient()){
            return User::find(Auth::id())->transactionSongs()->paginate($limit);
        }
    }

    public function update($id)
    {
        if($this->user->isClient()){
            $cost = Song::find($id)->price;

            $this->updateUserWallet($cost);

            return User::find(Auth::id())->transactionSongs()->attach($id, ['cost' => $cost]);
        }
    }

    public function updateUserWallet($cost)
    {
        $user = User::find(Auth::id());

        $user->wallet = $user->wallet - $cost;

        $user->save();
    }
}
