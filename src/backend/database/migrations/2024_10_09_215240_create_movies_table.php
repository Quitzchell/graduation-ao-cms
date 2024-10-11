<?php

use App\Models\Director;
use App\Models\Review;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('title');
            $table->foreignIdFor(Director::class)->constrained();
            $table->year('release_year');
            $table->text('description')->nullable();
            $table->text('trailer_url')->nullable();
            $table->foreignIdFor(Review::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
