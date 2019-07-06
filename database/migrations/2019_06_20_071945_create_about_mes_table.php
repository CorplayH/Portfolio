<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutMesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_mes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('generalInfo')->nullable(true)->comment('generalInfo');
            $table->text('testimonials')->nullable(true)->comment('testimonials');
            $table->text('strengths')->nullable(true)->comment('strengths');
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
        Schema::dropIfExists('about_mes');
    }
}
