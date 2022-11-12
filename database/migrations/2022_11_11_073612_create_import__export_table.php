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
            Schema::create('import__export', function (Blueprint $table) {
                $table->id();
                $table->text('name');
                $table->text('delivery_address');
                $table->dateTime('received_date');
                $table->dateTime('delivery_date');
                $table->foreignId('partner_id')->constrained('partners');
                $table->text('status');
            });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import__export');
    }
};
