<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('order_line')){
            Schema::create('order_line', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained('order');
                $table->dateTime('create_date');
                $table->foreignId('product_id')->constrained('product');
                $table->double('volume');
                $table->integer('amount');
                $table->text('note')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_line');
    }
};
