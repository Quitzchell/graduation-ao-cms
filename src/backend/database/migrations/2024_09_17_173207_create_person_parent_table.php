<?php

use App\Models\Person;
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
        Schema::create('person_parent', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Person::class, 'person_id');
            $table->foreignIdFor(Person::class, 'parent_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('parent_id')->references('id')->on('people');
            $table->unique(['person_id', 'parent_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_parent');
    }
};
