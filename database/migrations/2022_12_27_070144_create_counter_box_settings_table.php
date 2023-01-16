<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounterBoxSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counter_box_settings', function (Blueprint $table) {
            $table->id();
            $table->string('counter_box1_icon',255)->nullable();
            $table->string('counter_box1_number',255)->nullable();
            $table->string('counter_box1_title',255)->nullable();
            $table->string('counter_box1_text',255)->nullable();
            $table->string('counter_box2_icon',255)->nullable();
            $table->string('counter_box2_number',255)->nullable();
            $table->string('counter_box2_title',255)->nullable();
            $table->string('counter_box2_text',255)->nullable();
            $table->string('counter_box3_icon',255)->nullable();
            $table->string('counter_box3_number',255)->nullable();
            $table->string('counter_box3_title',255)->nullable();
            $table->string('counter_box3_text',255)->nullable();
            $table->string('counter_box4_icon',255)->nullable();
            $table->string('counter_box4_number',255)->nullable();
            $table->string('counter_box4_title',255)->nullable();
            $table->string('counter_box4_text',255)->nullable();
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
        Schema::dropIfExists('counter_box_settings');
    }
}
