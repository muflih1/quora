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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->unsignedBigInteger('answer_id')->nullable();
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
            $table->foreign('comment_id')
                ->references('id')
                ->on('comments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
