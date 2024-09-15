<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj', 14)->unique();
            $table->string('name', 100);
            $table->string('logo')->nullable();
            $table->string('description')->nullable();
            $table->json('tags');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
