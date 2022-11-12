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
        // if(!Schema::hasTable('template')) {
            Schema::dropIfExists('template');
            Schema::create('template', function (Blueprint $table) {
                $table->id();
                $table->text('name');
                $table->foreignId('category_id')->constrained('product_category');
                $table->text('note');
            });
        // } else {

        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template');
    }
};