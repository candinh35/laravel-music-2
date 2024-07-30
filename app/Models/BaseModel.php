<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    // search item by name
    public function scopeName($query, $name = null)
    {
        if ($name) {
            return $query->where('name', 'LIKE', '%' . $name . '%');
        }
        return $query->whereRaw("1 = 1");
    }
}
