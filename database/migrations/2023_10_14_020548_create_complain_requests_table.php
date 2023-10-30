<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complain_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complain_id'); // this is working
            $table->foreign('complain_id')->references('id')->on('complaints');
            $table->unsignedBigInteger('lab_admin_id'); // this is working
            $table->foreign('lab_admin_id')->references('id')->on('users');
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
        Schema::dropIfExists('complain_requests');
    }
}
