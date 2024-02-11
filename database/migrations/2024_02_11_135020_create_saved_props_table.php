<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('saved_props', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');// Add this line to define the user_id column
            $table->unsignedBigInteger('prop_id');
            $table->string('title')->default('');
            $table->string('image')->default('');
            $table->string('location')->default('');
            $table->string('price')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saved_props');
    }
};
