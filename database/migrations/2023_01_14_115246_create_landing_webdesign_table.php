<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingWebdesignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_webdesign', function (Blueprint $table) {
            $table->id();
            $table->string('locale',2)->default('fa');
            $table->string('h1_hidden')->nullable();
            $table->string('nav_title',255)->nullable();
            $table->string('cta_image',1024)->nullable();
            $table->string('cta_uptitle',255)->nullable();
            $table->string('cta_title',255)->nullable();
            $table->string('cta_text',255)->nullable();
            $table->string('cta_btn1_text',255)->nullable();
            $table->string('cta_btn1_icon',255)->nullable();
            $table->string('cta_btn1_link',255)->nullable();
            $table->string('cta_btn2_text',255)->nullable();
            $table->string('cta_btn2_icon',255)->nullable();
            $table->string('cta_btn2_link',255)->nullable();
            $table->string('video',1024)->nullable();
            $table->string('video_poster',1024)->nullable();
            $table->string('faq_title',255)->nullable();
            $table->longText('faq')->nullable();
            $table->string('summary',1024)->nullable();
            $table->longText('details')->nullable();
            $table->string('article_btn_text',255)->nullable();
            $table->string('article_btn_icon',255)->nullable();
            $table->string('article_btn_link',255)->nullable();
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
        Schema::dropIfExists('landing_webdesigns');
    }
}
