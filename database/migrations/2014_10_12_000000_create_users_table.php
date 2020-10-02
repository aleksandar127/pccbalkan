<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('naziv');
            $table->string('vrsta_obuke');
            $table->integer('broj_zaposlenih');
            $table->dateTime('termin', 0);
            $table->string('mesto');
            $table->string('resursi');
            $table->integer('broj_zaposlenih_r')->nullable();
            $table->smallInteger('ocena')->nullable();
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
