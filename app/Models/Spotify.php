<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Spotify extends Model
{
    use HasFactory;
    protected $table = 'spotify';

    protected $fillable = [
        "link",
        "title",
        "description",
        "published_at"
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
