<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_settings', function (Blueprint $table) {
            $table->id();
            $table->string('event1_title',255)->nullable();
            $table->string('event1_text',255)->nullable();
            $table->string('event1_btn_text',255)->nullable();
            $table->string('event1_btn_icon',255)->nullable();
            $table->string('event1_btn_link',255)->nullable();
            $table->string('event2_title',255)->nullable();
            $table->string('event2_text',255)->nullable();
            $table->string('event2_btn_text',255)->nullable();
            $table->string('event2_btn_icon',255)->nullable();
            $table->string('event2_btn_link',255)->nullable();
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
        Schema::dropIfExists('events_settings');
    }
}
