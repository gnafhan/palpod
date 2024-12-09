<?php

namespace App\Http\Controllers;

use App\Models\Dislike;
use App\Models\Like;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function like(Request $request, string $id)
    {
        // check if user already like the rating
        $like = Like::where("rating_id", $id)
            ->where("session_id", $request->session()->getId())
            ->first();

        if ($like) {
            return response()->json(
                ["message" => "You already like this rating"],
                400
            );
        }

        // check if user already dislike the rating
        $dislike = Dislike::where("rating_id", $id)
            ->where("session_id", $request->session()->getId())
            ->first();

        if ($dislike) {
            $dislike->delete();
        }

        // create like rating
        Like::create([
            "rating_id" => $id,
            "session_id" => $request->session()->getId(),
            "like" => true,
        ]);

        return response()->json(["message" => "You like this rating"], 200);
    }

    public function dislike(Request $request, string $id)
    {
        // check if user already dislike the rating
        $dislike = Dislike::where("rating_id", $id)
            ->where("session_id", $request->session()->getId())
            ->first();

        if ($dislike) {
            return response()->json(
                ["message" => "You already dislike this rating"],
                400
            );
        }

        // check if user already like the rating
        $like = Like::where("rating_id", $id)
            ->where("session_id", $request->session()->getId())
            ->first();

        if ($like) {
            $like->delete();
        }

        // create dislike rating
        Dislike::create([
            "rating_id" => $id,
            "session_id" => $request->session()->getId(),
            "dislike" => true,
        ]);

        return response()->json(["message" => "You dislike this rating"], 200);
    }
}
