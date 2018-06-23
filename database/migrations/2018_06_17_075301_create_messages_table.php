<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('to')->unsigned();
            $table->integer('from')->unsigned();
            $table->text('message')->nullable();
            $table->boolean('status');
            $table->integer('parent_id')->default(0);
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
        Schema::dropIfExists('messages');
    }
}
