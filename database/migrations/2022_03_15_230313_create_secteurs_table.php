<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secteurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('user_id')->nullable();
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
        Schema::drop('secteurs');
    }
}
