<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Song extends BaseModel
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'singer_id',
        'album_id',
        'category_id',
        'image_path',
        'music_path',
        'price',
        'introduction',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['singer:id,name'];


    public function singer(): BelongsTo
    {
        return $this->belongsTo(Singer::class, 'singer_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'playlists', 'song_id', 'user_id');
    }

    public function transactionUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'transactions', 'song_id', 'user_id')->withPivot(['cost', 'created_at']);
    }

    public function getLimitNewSong($limit)
    {
        return Song::with('singer')->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}
