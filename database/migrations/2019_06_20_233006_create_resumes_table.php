<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('educations')->nullable(true)->comment('educations');
            $table->text('experiences')->nullable(true)->comment('experiences');
            $table->text('skills')->nullable(true)->comment('skills');
            $table->string('cvUrl')->nullable(true)->comment('cvUrl');
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
        Schema::dropIfExists('resumes');
    }
}
