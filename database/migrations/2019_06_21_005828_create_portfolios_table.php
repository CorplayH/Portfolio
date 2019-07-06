<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('allTags')->nullable(true)->comment('allTags');
            $table->text('allTypes')->nullable(true)->comment('allTypes');
            $table->text('details')->nullable(true)->comment('details');
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
        Schema::dropIfExists('portfolios');
    }
}
