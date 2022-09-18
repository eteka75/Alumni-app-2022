<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postes', function (Blueprint $table) {
            $table->id();
            $table->string('fonction')->nullable();
            $table->string('structure')->nullable();
            $table->bigInteger('secteur_id');
            $table->string('lieu_poste')->nullable();
            $table->integer('annee_poste');
            $table->string('site_web')->nullable();
            $table->text('contact')->nullable();
            $table->text('renseignements')->nullable();
            $table->bigInteger('user_id')->nullable();
            #$table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('postes');
    }
}
