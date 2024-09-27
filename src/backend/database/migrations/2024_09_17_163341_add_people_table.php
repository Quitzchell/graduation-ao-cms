<?php

use App\Models\City;
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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('middle_name')->nullable();
            $table->string('surname');
            $table->foreignIdFor(City::class, 'place_of_birth_id');
            $table->foreignIdFor(City::class, 'place_of_death_id');
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_death')->nullable();
            $table->enum('gender', ['M', 'F', 'X'])->default('X');
            $table->string('profile_img')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mother_id')->references('id')->on('people')->nullOnDelete();
            $table->foreign('father_id')->references('id')->on('people')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
