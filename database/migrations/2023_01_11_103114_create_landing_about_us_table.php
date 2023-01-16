<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_about_us', function (Blueprint $table) {
            $table->id();
            $table->string('locale',2)->default('fa');
            $table->string('page_title',255)->nullable();
            $table->string('uptitle',255)->nullable();
            $table->string('title',255)->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('items')->nullable();
            $table->string('image',512)->nullable();
            $table->string('features_uptitle',255)->nullable();
            $table->string('features_title',255)->nullable();
            $table->string('features_box1_icon',255)->nullable();
            $table->string('features_box1_title',255)->nullable();
            $table->string('features_box1_text',255)->nullable();
            $table->string('features_box2_icon',255)->nullable();
            $table->string('features_box2_title',255)->nullable();
            $table->string('features_box2_text',255)->nullable();
            $table->string('features_box3_icon',255)->nullable();
            $table->string('features_box3_title',255)->nullable();
            $table->string('features_box3_text',255)->nullable();
            $table->string('team_uptitle',255)->nullable();
            $table->string('team_title',255)->nullable();
            $table->string('feedback_uptitle',255)->nullable();
            $table->string('feedback_title',255)->nullable();
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
        Schema::dropIfExists('landing_about_us');
    }
}
