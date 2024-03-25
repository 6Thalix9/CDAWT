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
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id');
            $table->integer('max_players')->default(3); // Including the creator
            $table->timestamp('game_date')->useCurrent();
            $table->boolean('is_public')->default(true);
            $table->boolean('started')->default(false);
            $table->boolean('finished')->default(false);
            $table->timestamps();

            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parties');
    }
};
