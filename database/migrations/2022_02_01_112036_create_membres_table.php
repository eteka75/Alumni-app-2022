<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('site')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->boolean('Sexe')->nullable();
            $table->string('poste')->nullable();
            $table->string('photo')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->longText('biographie')->nullable();
            $table->string('lien_facebook')->nullable();
            $table->string('lien_linkedin')->nullable();
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
        Schema::drop('membres');
    }
}
