<?php

namespace App\Livewire;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\Rating;
use App\Models\Spotify;
use Livewire\Component;
use Livewire\WithPagination;

class RatingComponent extends Component
{
    use WithPagination;

    public $spotifyId;
    public $Id;
    public $name;
    public $rating;
    public $comment = "";
    private function getrating()
    {
        $ratings = Rating::all();
        $length = count($ratings);
        $rate = 0;
        foreach ($ratings as $rating) {
            $rate += $rating->rating;
        }
        return round($rate / ($length > 0 ? $length : 1), 1);
    }
    public function store()
    {
        Rating::create([
            "spotify_id" => $this->spotifyId,
            "name" => $this->name,
            "rating" => $this->rating,
            "comment" => $this->comment,
        ]);
        session()->flash("success", "Berhasil");
        $this->reset("Id", "name", "rating", "comment");

        $this->render();
    }
    public function mount($spotifyId)
    {
        $this->spotifyId = $spotifyId;
    }
    public function render()
    {
        $ratings = Rating::with("likes", "dislikes")
            ->where("spotify_id", $this->spotifyId)
            ->get();
        return view("livewire.rating-component", [
            "spotify" => Spotify::find($this->spotifyId),
            // 'ratings' => Rating::paginate(10),
            "ratings" => $ratings,
            "rate" => $this->getrating(),
        ]);
    }

    public function like($ratingId)
    {
        // check if user already like the rating
        $like = Like::where("rating_id", $ratingId)
            ->where("session_id", session()->getId())
            ->first();

        if ($like) {
            $like->delete();

            $this->render();
            return;
        }

        // check if user already dislike the rating
        $dislike = Dislike::where("rating_id", $ratingId)
            ->where("session_id", session()->getId())
            ->first();

        if ($dislike) {
            $dislike->delete();
        }

        // create like rating
        Like::create([
            "rating_id" => $ratingId,
            "session_id" => session()->getId(),
            "like" => true,
        ]);

        $this->render();
    }

    public function dislike($ratingId)
    {
        // check if user already dislike the rating
        $dislike = Dislike::where("rating_id", $ratingId)
            ->where("session_id", session()->getId())
            ->first();

        if ($dislike) {
            $dislike->delete();

            $this->render();
            return;
        }

        // check if user already like the rating
        $like = Like::where("rating_id", $ratingId)
            ->where("session_id", session()->getId())
            ->first();

        if ($like) {
            $like->delete();
        }

        // create dislike rating
        Dislike::create([
            "rating_id" => $ratingId,
            "session_id" => session()->getId(),
            "dislike" => true,
        ]);

        $this->render();
    }
}
