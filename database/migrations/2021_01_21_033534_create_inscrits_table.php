<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscritsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscrits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifiant_student');
            $table->string('prenom');
            $table->string('nom');
            $table->string('password');
            $table->string('mail')->unique();
            $table->text('adresse')->nullable();
            $table->text('bio')->nullable();
            $table->enum('sex', ['H', 'F'])->default('H');
            $table->string('ine')->unique();
            $table->dateTime('dateNaissance')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('inscrits');
    }
}
