<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    use HasFactory;

    protected $table = "dislike_rating";

    protected $fillable = ["rating_id", "session_id", "dislike"];

    public function rating()
    {
        return $this->belongsTo(Rating::class);
    }
}
