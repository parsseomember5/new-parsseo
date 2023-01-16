<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features_settings', function (Blueprint $table) {
            $table->id();
            $table->string('features_uptitle',255)->nullable();
            $table->string('features_title',255)->nullable();
            $table->string('features_video_image',1024)->nullable();
            $table->string('features_video_link',1024)->nullable();
            $table->string('features_item1_title',255)->nullable();
            $table->string('features_item1_text',255)->nullable();
            $table->string('features_item1_icon',255)->nullable();
            $table->string('features_item2_title',255)->nullable();
            $table->string('features_item2_text',255)->nullable();
            $table->string('features_item2_icon',255)->nullable();
            $table->string('features_item3_title',255)->nullable();
            $table->string('features_item3_text',255)->nullable();
            $table->string('features_item3_icon',255)->nullable();
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
        Schema::dropIfExists('features_settings');
    }
}
