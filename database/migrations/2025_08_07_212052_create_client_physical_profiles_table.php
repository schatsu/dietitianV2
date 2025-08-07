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
        Schema::create('client_physical_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Client::class)->constrained()->cascadeOnDelete();
            $table->decimal('initial_weight', 5, 2)->nullable()->index();
            $table->decimal('initial_height', 5, 2)->nullable()->index();
            $table->decimal('target_weight', 5, 2)->nullable()->index();
            $table->string('goal_type')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_physical_profiles');
    }
};
