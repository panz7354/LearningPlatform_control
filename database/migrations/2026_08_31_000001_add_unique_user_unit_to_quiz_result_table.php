<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quiz_result', function (Blueprint $table) {
            // 同一個使用者、同一章，只能有一筆測驗結果
            $table->unique(['user_id', 'unit_id'], 'quiz_result_user_unit_unique');
        });
    }

    public function down(): void
    {
        Schema::table('quiz_result', function (Blueprint $table) {
            $table->dropUnique('quiz_result_user_unit_unique');
        });
    }
};
