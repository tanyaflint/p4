<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTeammateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_teammate', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            # `activity_id` and `teammate_id` will be foreign keys, so they have to be unsigned
            # `activity_id` will reference the `activities table` and `teammate_id` will reference the `teammate` table.
            $table->integer('activity_id')->unsigned();
            $table->integer('teammate_id')->unsigned();

            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('teammate_id')->references('id')->on('teammates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_teammate');
    }
}
