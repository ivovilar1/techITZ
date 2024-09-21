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
            $table->string('cnpj', 14)->unique()->index();
            $table->string('email', 200)->unique()->index();
            $table->string('name', 200);
            $table->string('logo')->nullable();
            $table->string('description')->nullable();
            $table->string('linkedin', 200)->nullable();
            $table->string('twitter', 200)->nullable();
            $table->string('instagram', 200)->nullable();
            $table->json('tags');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
