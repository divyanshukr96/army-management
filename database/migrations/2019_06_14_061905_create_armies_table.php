<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArmiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armies', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->nullable();
            $table->date('dob')->nullable(); // Date of Birth


            $table->string('religion')->nullable();
            $table->string('caste')->nullable();

            $table->string('blood_group')->nullable();

            $table->string('regd_no')->unique()->nullable();
            $table->string('id_card_no')->nullable();
            $table->string('rank')->nullable();
            $table->date('doe')->nullable(); // Date of Enrollment


            $table->string('marital_status')->nullable();
            $table->string('mother_tongue')->nullable();

            $table->string('medical')->nullable();
            $table->string('education')->nullable();

            $table->string('nrs')->nullable(); // Nearest railway station


            $table->text('image')->nullable();

            $table->boolean('registered')->default(false);
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
        Schema::dropIfExists('armies');
    }
}
