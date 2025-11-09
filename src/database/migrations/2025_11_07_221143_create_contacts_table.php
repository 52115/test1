<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 8);
            $table->string('first_name', 8);
            $table->string('gender', 10);
            $table->string('email');
            $table->string('tel1', 5);
            $table->string('tel2', 5);
            $table->string('tel3', 5);
            $table->string('address');
            $table->string('building')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('content', 120);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
