<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('site')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->boolean('sexe')->nullable();
            $table->string('specialite')->nullable();
            $table->string('ecole')->nullable();
            $table->string('poste')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('lien_facebook')->nullable();
            $table->string('lien_linkedin')->nullable();
            $table->string('photo')->nullable();
            $table->string('biographie')->nullable();
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
        Schema::drop('enseignants');
    }
}
