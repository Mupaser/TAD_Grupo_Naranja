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
        Schema::create('pieces', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->double("price");
            $table->enum("state",["Available","Not available"]);
            $table->double("offer");
            $table->text("description");
            $table->string("image");
        });

        Schema::create('favorites_list_piece', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('favorites_list_id')->constrained()->onDelete("cascade");
            $table->foreignId('piece_id')->constrained()->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pieces');
        Schema::dropIfExists('favorites_list_piece');
    }
};
