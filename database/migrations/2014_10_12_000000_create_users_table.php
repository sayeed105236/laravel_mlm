<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name');
            $table->string('email');
            $table->string('number')->nullable();
            $table->string('birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('sponsor')->nullable();
            $table->string('placement_id')->nullable();
            $table->integer('position')->nullable();
            $table->integer('package_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('left_count')->unsigned()->default('0');
            $table->integer('right_count')->unsigned()->default('0');
            $table->string('left_side')->nullable();
            $table->string('right_side')->nullable();
            $table->rememberToken();
            $table->string('utype')->default('USR')->comment('ADM for Admin USR for normal user');
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
        Schema::dropIfExists('users');
    }
}
