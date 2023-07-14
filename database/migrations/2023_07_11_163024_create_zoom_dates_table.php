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
        Schema::create('zoom_dates', function (Blueprint $table) {
            $table->id();
            $table->integer('referral_id')->unsigned()->nullable();
            $table->string('date');
            $table->string('time');
            $table->string('join_url');
            $table->string('password')->nullable();
            $table->integer('participants')->default(0);
            $table->boolean('active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zoom_dates');
    }
};
