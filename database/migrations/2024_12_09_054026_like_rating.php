<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // like rating per user with session
        Schema::create("like_rating", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("rating_id");
            $table->string("session_id");
            $table->boolean("like");
            $table->foreign("rating_id")->references("id")->on("ratings");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("like_rating");
    }
};
