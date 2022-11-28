<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('mission_id')->constrained()->cascadeOnDelete();
            $table->datetime('submit_time')->nullable();
            $table->string('location')->nullable();
            $table->json('result')->nullable();
            $table->enum('status', ['未上傳','未處理', '已檢閱', '待檢閱'])->default('未上傳');
            $table->enum('category', ['手部拍打', '手部捏握', '手掌翻面', '抬腳']);
            $table->string('doctor_comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
};
