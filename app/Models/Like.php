<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = "like_rating";

    protected $fillable = ["rating_id", "session_id", "like"];

    public function rating()
    {
        return $this->belongsTo(Rating::class);
    }
}
