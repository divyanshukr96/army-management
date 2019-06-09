<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_details', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->uuid('personal_detail_id');

            $table->string('father_name');
            $table->string('father_age');
            $table->string('father_occupation');

            $table->string('mother_name');
            $table->string('mother_age');
            $table->string('mother_occupation');

            $table->text('address');

            $table->string('mobile');


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
        Schema::dropIfExists('family_details');
    }
}
