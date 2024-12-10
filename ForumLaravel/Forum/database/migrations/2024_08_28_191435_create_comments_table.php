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
    // database/migrations/2024_08_28_191435_create_comments_table.php
public function up()
{
    Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('topic_id')->nullable();
        $table->unsignedBigInteger('post_id'); 
        $table->text('content');
        $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade'); // Adicione esta linha
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
        Schema::dropIfExists('comments');
    }
};
