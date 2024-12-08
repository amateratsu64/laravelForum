<?php
// database/migrations/2024_08_28_191441_add_topic_id_to_comments_table.php

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
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('topic_id')->after('id'); // Adiciona a coluna topic_id
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade'); // Define a chave estrangeira
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['topic_id']); // Remove a chave estrangeira
            $table->dropColumn('topic_id'); // Remove a coluna
        });
    }
};