<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('qualification')->nullable();
            $table->string('region')->nullable();
            $table->string('religion')->nullable();
            $table->string('mobile')->nullable();
            $table->string('next_of_kin')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
