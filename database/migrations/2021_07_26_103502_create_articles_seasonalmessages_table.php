<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesSeasonalmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_seasonalmessage', function (Blueprint $table) {
            $table->primary(['article_id', 'seasonalmessage_id']);
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->foreignId('seasonalmessage_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('article_seasonalmessage');
    }
}
