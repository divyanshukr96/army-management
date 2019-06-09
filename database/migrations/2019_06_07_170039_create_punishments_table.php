<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePunishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punishments', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->uuid('personal_detail_id');

            $table->string('place')->nullable();
            $table->date('offence_date')->nullable();
            $table->string('rank')->nullable();
            $table->text('offence')->nullable();
            $table->string('witness')->nullable();
            $table->string('punishment')->nullable();
            $table->date('order_date')->nullable();
            $table->string('by_whom')->nullable();
            $table->text('remark')->nullable();

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
        Schema::dropIfExists('punishments');
    }
}
