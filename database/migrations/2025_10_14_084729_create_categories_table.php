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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->text("description");
        });

        Schema::create('category_piece', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('piece_id')->constrained()->onDelete("cascade");
            $table->foreignId('category_id')->constrained()->onDelete("cascade");
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('category_piece');
    }
};
