<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('User name');
            $table->text('titles')->nullable(true)->comment('user titles');
            $table->string('image')->default('')->comment('User avatar');
            $table->text('basicInfo')->nullable(true)->comment('user basic Info');
            $table->string('background')->default('')->comment('background image');
            $table->string('uToken')->nullable(true)->comment('uToken');
            $table->bigInteger('userId')->default(0)->comment('user Id');
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
        Schema::dropIfExists('user_infos');
    }
}
