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
        Schema::create('warehouse_inventory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained('template');
            $table->foreignId('employee_id')->constrained('employee');
            $table->integer('actual_number');
            $table->integer('quantity_checked');
            $table->date('date');
            $table->json('history');
            $table->text('note')->nullable();
            $table->integer('deviant')->nullable();
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
        Schema::dropIfExists('warehouse_inventory');
    }
};
