<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRisidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risidents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('street');
            $table->string('city');
            $table->integer('postal_code');
            $table->string('home_phone');
            $table->integer('student_id')->unsigned()->index();  
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
        Schema::dropIfExists('risidents');
    }
}
