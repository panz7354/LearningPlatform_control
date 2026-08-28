<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quiz_result', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->integer('unit_id');
            $table->integer('score');
            $table->tinyInteger('effort_score')->nullable(); // 1–9，答完才填
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_result');
    }
};
