<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'published_status',
        'poster',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
