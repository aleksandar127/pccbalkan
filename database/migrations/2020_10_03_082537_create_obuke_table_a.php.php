<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObukeTableA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obuke', function (Blueprint $table) {
            $table->id();
            $table->string('naziv_obuke');
            $table->string('vrsta_obuke');
            $table->integer('broj_zaposlenih');
            $table->dateTime('termin', 0);
            $table->string('mesto_odrzavanja_obuke');
            $table->string('potrebni_resursi');
            $table->integer('realizovano_broj_zaposlenih')->nullable();
            $table->smallInteger('ocena')->nullable();
            //$table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obuke');
    }
}
