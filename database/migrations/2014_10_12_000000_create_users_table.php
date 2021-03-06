<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->uuid('id');
            $table->char('short_id',12);
            $table->integer('user_group_id'); // 0 = normal user, 1 = managers, 2 = admin
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('activation_token',64)->nullable();
            $table->boolean('active')->default(false);
            $table->string('status',25)->nullable(); // Pending / active / TODO
            $table->integer('subscription_id')->unsigned()->default(0); // 0 = Free Subscription
            $table->rememberToken();
            $table->primary('id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
