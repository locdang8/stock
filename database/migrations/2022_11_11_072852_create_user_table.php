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
        // Schema::create('user', function (Blueprint $table) {
        //     $table->id();
        //     $table->text('name');
        //     $table->string('password');
        //     $table->tinyInteger('perm_read');
        //     $table->tinyInteger('perm_write');
        //     $table->tinyInteger('perm_create');
        //     $table->tinyInteger('perm_unlink');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('user');
    }
};
