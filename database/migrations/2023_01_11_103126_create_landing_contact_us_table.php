<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('locale',2)->default('fa');
            $table->string('page_title',255)->nullable();
            $table->string('uptitle',255)->nullable();
            $table->string('title',255)->nullable();
            $table->mediumText('description')->nullable();
            $table->string('address',255)->nullable();
            $table->string('support',255)->nullable();
            $table->string('email',255)->nullable();
            $table->mediumText('map')->nullable();
            $table->string('form_title',255)->nullable();
            $table->string('form_description',512)->nullable();
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
        Schema::dropIfExists('landing_contact_us');
    }
}
