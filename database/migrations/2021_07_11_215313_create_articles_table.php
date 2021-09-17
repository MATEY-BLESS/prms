<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->integer('admin_id')->unsigned()->index()->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('status');
            $table->text('source');
            $table->text('second_source')->nullable();
            $table->string('post_image')->nullable();
            $table->string('image_caption')->nullable();
            $table->text('body');
            $table->text('description')->nullable();
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('articles');
    }
}
