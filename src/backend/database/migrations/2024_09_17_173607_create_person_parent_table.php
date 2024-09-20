<?php

use App\Models\Person;
use App\Models\Pet;
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
        Schema::create('person_pet', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pet::class, 'pet_id');
            $table->foreignIdFor(Person::class, 'person_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pet_id')->references('id')->on('pets');
            $table->foreign('person_id')->references('id')->on('people');
            $table->unique(['pet_id', 'person_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_pet');
    }
};
