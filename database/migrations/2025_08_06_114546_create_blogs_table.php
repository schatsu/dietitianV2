<?php

use App\Enums\BlogStatusEnum;
use App\Models\Category;
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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->index();
            $table->string('description')->nullable()->index();
            $table->string('slug')->nullable()->index();
            $table->longText('content')->nullable();
            $table->string('status')->default(BlogStatusEnum::ACTIVE)->nullable()->index();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->integer('order')->nullable()->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->text('seo_title')->nullable()->index();
            $table->text('seo_description')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
