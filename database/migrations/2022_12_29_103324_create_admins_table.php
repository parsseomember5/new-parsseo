<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->longText('avatar')->nullable();
            $table->mediumText('bio')->nullable();
            $table->string('instagram',1024)->nullable();
            $table->string('linkedin',1024)->nullable();
            $table->string('twitter',1024)->nullable();
            $table->string('telegram',1024)->nullable();
            $table->string('facebook',1024)->nullable();
            $table->string('dribbble',1024)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
