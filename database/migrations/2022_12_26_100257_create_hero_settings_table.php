<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title',255)->nullable();
            $table->string('hero_subtitle',255)->nullable();
            $table->string('hero_image',1024)->nullable();
            $table->string('hero_btn_text',255)->nullable();
            $table->string('hero_btn_icon',255)->nullable();
            $table->string('hero_btn_link',255)->nullable();
            $table->string('hero_play_video_link',255)->nullable();
            $table->string('hero_box_title',255)->nullable();
            $table->string('hero_box_text',255)->nullable();
            $table->string('hero_box_btn_text',255)->nullable();
            $table->string('hero_box_btn_icon',255)->nullable();
            $table->string('hero_box_btn_link',255)->nullable();

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
        Schema::dropIfExists('hero_settings');
    }
}
