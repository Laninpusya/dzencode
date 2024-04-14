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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email');
            $table->string('url')->nullable();
            $table->text('text');
            $table->boolean('is_reply')->default(0);
            $table->unsignedBigInteger('parent_message_id')->nullable();
            $table->foreign('parent_message_id')->references('id')->on('messages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
