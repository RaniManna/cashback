<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashback_offers', function (Blueprint $table) {
            $table->id('id');
            $table->integer('category_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->string('Title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->double('points');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cashback_offers');
    }
};
