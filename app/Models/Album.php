<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends BaseModel
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
        'image_path',
        'description',
    ];

    public function getLimitNewAlbum($limit)
    {
        return Album::with('singer')->orderBy('created_at', 'desc')->limit($limit)->get();
    }

    public function singer(): BelongsTo
    {
        return $this->belongsTo(Singer::class, 'singer_id', 'id');
    }

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class, 'album_id', 'id');
    }
}
