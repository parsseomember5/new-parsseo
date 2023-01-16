<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale',2)->default('fa');
            $table->unsignedBigInteger('translation_id')->nullable();
            $table->foreign('translation_id')->references('id')->on('feedbacks');
            $table->string('name');
            $table->string('title');
            $table->string('text',1024);
            $table->string('stars',1)->default(5);
            $table->string('image',1024)->nullable();
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
        Schema::table('feedbacks', function (Blueprint $table) {
            //
        });
    }
}
