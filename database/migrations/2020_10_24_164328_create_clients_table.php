<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('birth_date', 12);
            $table->string('gender', 10);

            $table->integer('adress_id')->unsigned();
            $table->foreign('adress_id')->references('id')->on('adresses');

            $table->integer('phone_id')->unsigned();
            $table->foreign('phone_id')->references('id')->on('phones');

            $table->integer('salesman_id')->unsigned();
            $table->foreign('salesman_id')->references('id')->on('salesmen');

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
        Schema::dropIfExists('clients');
    }
}
