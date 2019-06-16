<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->uuid('army_id');

            $table->string('name');
            $table->string('mobile')->nullable();
            $table->string('age')->nullable();
            $table->date('dob')->nullable(); // Date of Birth
            $table->string('blood_group')->nullable();
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();

            $table->string('relation');

            $table->date('dom')->nullable(); // Date of Marriage
            $table->string('certificate')->nullable();
            $table->string('pan_card')->nullable();

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
        Schema::dropIfExists('families');
    }
}
