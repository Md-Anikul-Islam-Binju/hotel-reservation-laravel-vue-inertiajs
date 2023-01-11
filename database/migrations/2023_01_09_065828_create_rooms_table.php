<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('amenities_id')->nullable();
            $table->string('name');
            $table->text('details')->nullable();
            $table->string('image')->nullable();
            $table->string('size')->nullable();
            $table->integer('maximum_occupancy')->nullable();
            $table->string('price');
            $table->integer('status')->comment('1=Active,0=Inactive');
            $table->softDeletes();
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
        Schema::dropIfExists('rooms');
    }
}
