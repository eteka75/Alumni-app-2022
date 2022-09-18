<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string("annee_academique")->default(null);
            $table->integer("etablissement_id")->default(null);
            $table->integer("filiere_id")->default(null);
            $table->integer("diplome_id")->default(null);
            $table->text("theme_memoire")->default(null);
            $table->text("theme_memoire")->default(null);
            
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('formations');
    }
}
