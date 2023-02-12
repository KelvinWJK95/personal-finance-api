<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class V1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('entries', function(Blueprint $table){

            $table->increments('id');

            $table->string('type');

            $table->dateTime('date');

            $table->string('description');

            $table->decimal('amount', 19, 6);

            $table->timestamps();
            
            $table->dateTime('deleted_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('entries');
    }
}
