<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ["spotify_id", "name", "rating", "comment"];

    public function spotify()
    {
        return $this->belongsTo(Spotify::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }

    public function getCountLikesAttribute()
    {
        return $this->likes->count();
    }

    public function getCountDislikesAttribute()
    {
        return $this->dislikes->count();
    }

    public function getIsLikedAttribute()
    {
        return $this->likes->where("session_id", session()->getId())->count() >
            0;
    }

    public function getIsDislikedAttribute()
    {
        return $this->dislikes
            ->where("session_id", session()->getId())
            ->count() > 0;
    }
}
