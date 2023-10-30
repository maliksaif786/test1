<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenueAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venue_allocations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lab_admin_id'); // this is working
            $table->foreign('lab_admin_id')->references('id')->on('users');
            $table->unsignedBigInteger('venue_id'); // this is working
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->date('date');
            $table->string('status');
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
        Schema::dropIfExists('venue_allocations');
    }
}
