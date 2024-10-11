<?php

use App\Models\Review;
use App\Models\Author;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('title');
            $table->foreignIdFor(Author::class)->constrained();
            $table->year('published_year');
            $table->text('description')->nullable();
            $table->foreignIdFor(Review::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
