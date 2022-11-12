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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained('template');
            $table->text('name');
            $table->text('note');
            $table->text('state');
            $table->float('height');
            $table->float('length');
            $table->float('width');
            $table->float('weight');
            $table->text('color');
            $table->double('price');
            $table->double('price_cost');
            $table->date('date_manufacture');
            $table->date('expiry_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
