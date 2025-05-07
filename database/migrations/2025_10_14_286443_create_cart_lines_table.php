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
        Schema::create('cart_lines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("number")->default(0);
            $table->double("totalPrice")->default(0);
            $table->foreignId('cart_id')->constrained()->onDelete("cascade");
            $table->foreignId('piece_id')->nullable()->constrained()->onDelete("set null");
            $table->unique(['cart_id', 'piece_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_lines');
    }
};
