<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pair_counts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->date('date')->nullable();
            $table->integer('no_of_pair')->nullable();
            $table->integer('status')->unsigned()->default('0');
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
        Schema::dropIfExists('pair_counts');
    }
}
