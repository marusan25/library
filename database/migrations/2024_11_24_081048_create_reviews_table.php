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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // 外部キー設定 https://qiita.com/Sunasuna24/items/469ef982c628f41e666f
            $table->foreignId('book_id')->constrained();
            $table->integer('score');
            $table->text('content'); // https://qiita.com/Otake_M/items/3c761e1a5e65b04c6c0e
            $table->dateTime('reviewed_at')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
