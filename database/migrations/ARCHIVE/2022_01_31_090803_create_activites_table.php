<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('statut')->nullable();
            $table->text('resume')->nullable();
            $table->string('image')->nullable();
            $table->string('contenu')->nullable();
            $table->integer('view_count')->nullable();
            $table->boolean('actif')->nullable();
            $table->string('site')->nullable();
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
        Schema::drop('activites');
    }
}
