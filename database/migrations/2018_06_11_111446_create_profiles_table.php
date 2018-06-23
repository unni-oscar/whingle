<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            // *************** Basic details *************** //
            $table->tinyInteger('created_by'); // created_by: 1 = Self, 2 = Parents/Guardian, 3 = Siblings, 4 = Friends, 5 = Relatives, 6 = Others
            $table->string('name');
            $table->tinyInteger('gender'); // 1 = Male, 0 = Female
            $table->date('dob'); 
            $table->tinyInteger('marital_status'); // marital_status: TODO
            $table->boolean('has_children')->nullable(); // 1 = yes, 0 = No
            $table->text('about')->nullable();
            // *************** Religion / Astro details *************** //
            $table->integer('mother_tongue_id');
            $table->integer('religion');
            $table->integer('caste');
            $table->integer('star')->nullable();
            $table->integer('moon_sign')->nullable();
            $table->tinyInteger('manglik')->nullable(); // 1 = Yes, 0 = No, 3 = Don't know, 4 = Not applicable
            $table->tinyInteger('horoscope')->nullable(); // // 1 = Yes, 0 = No, 3 = Don't know, 4 = Not applicable
            // *************** Education / Job details *************** //
            $table->integer('education')->nullable();
            $table->integer('education_in')->nullable();
            $table->integer('job')->nullable();
            $table->integer('job_as')->nullable();
            $table->integer('income')->nullable();
            // *************** Appearance details *************** //
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->tinyInteger('build')->nullable();
            $table->tinyInteger('complexion')->nullable();
            $table->tinyInteger('blood_group')->nullable();
            $table->boolean('disability')->nullable();
            // *************** Diet / Habits details *************** //
            $table->tinyInteger('diet')->nullable();
            $table->tinyInteger('smoke')->nullable();
            $table->tinyInteger('drink')->nullable();
            // *************** Family details *************** //
            $table->tinyInteger('father')->nullable();
            $table->tinyInteger('mother')->nullable();
            $table->tinyInteger('brothers')->nullable();
            $table->tinyInteger('brothers_married')->nullable();
            $table->tinyInteger('sisters')->nullable();
            $table->tinyInteger('sisters_married')->nullable();
            $table->tinyInteger('family_type')->nullable();
            $table->tinyInteger('family_status')->nullable();
            $table->tinyInteger('family_values')->nullable();
            // *************** Misc details *************** //
            $table->text('hobbies')->nullable();
            $table->text('interests')->nullable();
            // *************** Location/Contact details *************** //
            $table->integer('country_living')->nullable();
            $table->integer('state_living')->nullable();
            $table->integer('city_living')->nullable();
            $table->string('address')->nullable();
            $table->integer('contact_number')->nullable();
            
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('profiles');
    }
}
