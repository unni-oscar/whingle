<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('to')->unsigned();
            $table->integer('from')->unsigned();
            $table->tinyInteger('status'); // 0 = Pending, 1 = read, 2 = rejected
            $table->timestamps();

            $table->foreign('to')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade');

            $table->foreign('from')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interests');
    }
}
