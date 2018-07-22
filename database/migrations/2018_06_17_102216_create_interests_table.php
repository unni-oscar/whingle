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
        Schema::dropIfExists('interests');
        Schema::create('interests', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->char('to', 36);
            $table->char('from', 36);
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
