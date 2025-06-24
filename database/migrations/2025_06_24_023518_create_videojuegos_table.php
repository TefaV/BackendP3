<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('videojuegos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('videojuegos');
    }
};
