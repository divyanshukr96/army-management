<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNOKDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_o_k_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->uuid('personal_detail_id');
            $table->string('name');
            $table->string('relation')->nullable();
            $table->string('mobile')->nullable();

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
        Schema::dropIfExists('n_o_k_details');
    }
}
