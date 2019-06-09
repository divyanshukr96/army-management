<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCSDCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_s_d_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('personal_detail_id');

            $table->string('grocery')->nullable(); // Grocery Card no
            $table->string('liquor')->nullable(); // Liquor Card no

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
        Schema::dropIfExists('c_s_d_cards');
    }
}
