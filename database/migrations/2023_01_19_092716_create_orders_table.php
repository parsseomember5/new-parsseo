<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('discount_id')->nullable()->constrained();
            $table->string('res_number', 50)->nullable();
            $table->string('order_number', 50)->nullable();
            $table->string('terminal', 50)->default('zarinpal');
            $table->unsignedBigInteger('total_price');
            $table->unsignedBigInteger('discount_price');
            $table->unsignedBigInteger('price');
            $table->unsignedTinyInteger('count')->default(1);
            $table->integer('status')->default(0);
            $table->mediumText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
