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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->foreignId('room_type_id')->constrained()->cascadeOnDelete();
            $table->enum('status', [
                'available',
                'occupied',
                'cleaning',
                'maintenance',
                'reserved'
            ])->default('available');
            $table->decimal('price', 8, 2);
            $table->unsignedInteger('capacity');
            $table->unsignedTinyInteger('beds')->default(1);
            $table->unsignedTinyInteger('baths')->default(1);
            $table->text('image')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
