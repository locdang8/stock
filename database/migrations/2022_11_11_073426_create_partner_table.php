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
            Schema::create('partners', function (Blueprint $table) {
                $table->id();
                $table->text('name');
                $table->text('address');
                $table->string('phone');
                $table->string('email');
                $table->text('note');
                $table->date('birthday');
                $table->foreignId('bank_id')->constrained('bank_account');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('partners');
    }
};
