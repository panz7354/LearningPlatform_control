<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('program_attempt_log', function (Blueprint $table) {
            // 同一個使用者、同一章，只能有一筆作答結果
            $table->unique(['user_id', 'unit_id'], 'program_attempt_log_user_unit_unique');
        });
    }

    public function down(): void
    {
        Schema::table('program_attempt_log', function (Blueprint $table) {
            $table->dropUnique('program_attempt_log_user_unit_unique');
        });
    }
};
