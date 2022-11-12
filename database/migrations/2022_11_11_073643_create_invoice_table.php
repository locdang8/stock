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
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignId('partner_id')->constrained('partners');
            $table->foreignId('order_id')->constrained('order');
            $table->dateTime('create_date');
            $table->date('date_payment');
            $table->text('payment_term');
            $table->double('total_payment');
            $table->double('debt');
            $table->text('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
};
