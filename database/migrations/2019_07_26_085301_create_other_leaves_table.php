<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_leaves', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->uuid('army_id');

            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->string('loc')->nullable();

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
        Schema::dropIfExists('other_leaves');
    }
}
