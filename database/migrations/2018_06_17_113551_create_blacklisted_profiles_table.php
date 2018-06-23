<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlacklistedProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blacklisted_profiles', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->char('profile_id', 36);
            $table->char('blacklist_id', 36);
            $table->boolean('message')->default(0);
            $table->boolean('interest')->default(0);
            $table->boolean('search')->default(0);
            //TODO - need to complete
            $table->timestamps();

            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade');

            $table->foreign('blacklist_id')
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
        Schema::dropIfExists('blacklisted_profiles');
    }
}
