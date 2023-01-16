<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();
            $table->string('about_image',1024)->nullable();
            $table->string('about_video_image',1024)->nullable();
            $table->string('about_video_link',1024)->nullable();
            $table->string('about_uptitle',255)->nullable();
            $table->string('about_title',255)->nullable();
            $table->string('about_text',255)->nullable();
            $table->string('about_btn_text',255)->nullable();
            $table->string('about_btn_icon',255)->nullable();
            $table->string('about_btn_link',255)->nullable();
            $table->string('about_item1_title',255)->nullable();
            $table->string('about_item1_text',255)->nullable();
            $table->string('about_item2_title',255)->nullable();
            $table->string('about_item2_text',255)->nullable();
            $table->string('about_item3_title',255)->nullable();
            $table->string('about_item3_text',255)->nullable();
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
        Schema::dropIfExists('about_settings');
    }
}
