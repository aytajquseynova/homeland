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
        Schema::create('all_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Add this line to define the user_id column
            $table->unsignedBigInteger('prop_id');
            $table->string('agent_name');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_requests');
    }
};
