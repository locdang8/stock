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
            $table->text('note')->nullable();
            $table->float('height');
            $table->float('length');
            $table->float('width');
            $table->double('volume');
            $table->date('import_date')->nullable();
            $table->date('export_date')->nullable();
            $table->float('weight')->nullable();
            $table->string('color')->nullable();
            $table->double('price');
            $table->string('state');
            $table->integer('amount');
            $table->foreignId('partner_id')->nullable()->constrained('partner');
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
