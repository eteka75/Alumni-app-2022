<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->boolean('sexe')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('contact')->nullable();
            $table->string('nom_pere')->nullable();
            $table->string('nom_mere')->nullable();
            $table->string('contact_parents')->nullable();
            $table->string('nom_tuteur')->nullable();
            $table->string('contact_tuteur')->nullable();
            $table->string('email')->nullable();
            $table->integer('formation_id')->nullable();
            $table->string('classe')->nullable();
            $table->string('acte_de_naissance')->nullable();
            $table->string('dernier_bulletin')->nullable();
            $table->string('certificat')->nullable();
            $table->string('photo')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inscriptions');
    }
}
