<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venue_id'); // this is working
            $table->foreign('venue_id')->references('id')->on('venues');
            $table->unsignedBigInteger('user_id'); // this is working
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('category_id'); // this is working
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('sub_category_id')->nullable(); // this is working
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->string('status')->nullable();
            $table->date('date');
            $table->text('description');
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
        Schema::dropIfExists('complaints');
    }
}
