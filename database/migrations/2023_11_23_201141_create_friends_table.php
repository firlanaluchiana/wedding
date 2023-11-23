<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('wedding_id');
            $table->string('title');
            $table->longText('description');
            $table->string('image');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('wedding_id')->references('id')->on('weddings')->onDelete('cascade');
            $table->index(['user_id', 'wedding_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friends');
    }
};
