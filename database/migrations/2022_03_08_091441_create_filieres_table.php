<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filieres', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('nom')->nullable();
            $table->string('sigle')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->boolean('etat')->nullable();
            $table->bigInteger('entite_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('filieres');
    }
}
