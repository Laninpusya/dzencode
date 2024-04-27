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
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email');
            $table->string('url')->nullable();
            $table->text('text');
            $table->unsignedBigInteger('level')->nullable();
            $table->foreign('level')->references('id')->on('responses')->onDelete('cascade');

            $table->unsignedBigInteger('parent_message_id')->nullable();
            $table->foreign('parent_message_id')->references('id')->on('main_messages')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
