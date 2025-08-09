<?php

use App\Enums\DietProgramStatusEnum;
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
        Schema::create('diet_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Client::class)->constrained()->cascadeOnDelete();
            $table->string('name')->index();
            $table->date('start_date')->nullable();
            $table->date('target_date')->nullable();
            $table->text('program_notes')->nullable();
            $table->string('status')->default(DietProgramStatusEnum::ACTIVE)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diet_programs');
    }
};
