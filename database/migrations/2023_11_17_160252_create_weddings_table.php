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
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('groom_name');
            $table->string('bride_name');
            $table->longText('groom_bio');
            $table->longText('bride_bio');
            $table->string('groom_image');
            $table->string('bride_image');
            $table->date('wedding_date');
            $table->longText('ceremony');
            $table->datetime('ceremony_start');
            $table->datetime('ceremony_end');
            $table->longText('party');
            $table->datetime('party_start');
            $table->datetime('party_end');
            $table->string('street');
            $table->string('venue');
            $table->string('city');
            $table->string('slug');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index('user_id');
            $table->index('groom_name');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weddings');
    }
};
