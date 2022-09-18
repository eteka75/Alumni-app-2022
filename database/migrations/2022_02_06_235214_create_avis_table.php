<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAvisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avis', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom_prenom')->nullable();
            $table->string('fonction')->nullable();
            $table->mediumText('avis')->nullable();
            $table->string('photo')->nullable();
            $table->boolean('etat')->nullable();
            $table->integer('user_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('avis');
    }
}
