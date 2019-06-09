<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->nullable();
            $table->date('dob')->nullable(); // Date of Birth

//            $table->enum('religion', ['Buddhist', 'Christian', 'Hindu', 'Jain', 'Muslim', 'Sikh', 'Others']);
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();

//            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']);
            $table->string('blood_group')->nullable();

            $table->string('regd_no')->unique()->nullable();
            $table->string('id_card_no')->nullable();
            $table->string('rank')->nullable();
            $table->date('doe')->nullable(); // Date of Enrollment

//            $table->enum('marital_status', ['Single', 'Married', 'Widowed', 'Divorced', 'Separated']);

            $table->string('marital_status')->nullable();
            $table->string('mother_tongue')->nullable();

            $table->string('medical')->nullable();
            $table->string('education')->nullable();

            $table->string('nrs')->nullable(); // Nearest railway station


            $table->text('address')->nullable();
            $table->text('image')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('personal_details');
    }
}
