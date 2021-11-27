<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('referral_percentage');
            $table->integer('pair_amount')->nulalble();
            $table->integer('pair_percentage')->nullable();
            $table->integer('royality_bonus')->nullable();
            $table->integer('min_withdraw')->nullable();
            $table->integer('activation_charge')->nullable();
            $table->integer('transfer_charge')->nullable();
            $table->integer('level_1')->nullable();
            $table->integer('level_2')->nullable();
            $table->integer('level_3')->nullable();
            $table->integer('level_4')->nullable();
            $table->integer('level_5')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
}
