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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable()->index();
            $table->string('last_name')->nullable()->index();
            $table->string('slug')->unique()->nullable()->index();
            $table->string('email')->nullable()->unique()->index();
            $table->string('phone', 20)->nullable()->index();
            $table->string('status')->nullable()->index();
            $table->integer('age')->nullable()->index();
            $table->string('occupation')->nullable()->index();
            $table->string('gender')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
