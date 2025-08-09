<?php

use App\Models\DietProgram;
use App\Models\Meal;
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
        Schema::create('diet_program_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DietProgram::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Meal::class)->constrained()->cascadeOnDelete();
            $table->string('day');
            $table->string('meal_time');
            $table->integer('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diet_program_items');
    }
};
