<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gebruiker', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->integer('studentnummer')->unique();
            $table->string('password');
            $table->string('name');
            $table->enum('role', ['admin', 'student'])->default('student');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('gebruiker');
    }
};
