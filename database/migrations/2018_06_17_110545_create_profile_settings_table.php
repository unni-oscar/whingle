<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('profile_settings');
        Schema::create('profile_settings', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->char('profile_id', 36);
            //TODO - need to complete
            $table->boolean('hide_visit');
            $table->tinyInteger('show_contacts_to')->default(0); // 0 = Only registered Users, 2 = Only on request, 3 = Don't show, I will contact
            $table->timestamps();

            $table->foreign('profile_id')
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
        Schema::dropIfExists('profile_settings');
    }
}
