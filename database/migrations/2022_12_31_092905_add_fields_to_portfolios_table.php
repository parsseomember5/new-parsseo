<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('box1_title',255)->nullable();
            $table->string('box1_value',255)->nullable();
            $table->string('box2_title',255)->nullable();
            $table->string('box2_value',255)->nullable();
            $table->string('box3_title',255)->nullable();
            $table->string('box3_value',255)->nullable();
            $table->string('website',255)->nullable();
            $table->string('scroll_image',1024)->nullable();
            $table->mediumText('features')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            //
        });
    }
}
