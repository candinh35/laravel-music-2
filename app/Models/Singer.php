<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Singer extends BaseModel
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'dob',
        'introduction',
        'image_path',
    ];

    public function getLimitNewSinger($limit)
    {
        return Singer::orderBy('created_at', 'desc')->limit($limit)->get();
    }

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class, 'singer_id', 'id');
    }

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class, 'singer_id', 'id');
    }
}
