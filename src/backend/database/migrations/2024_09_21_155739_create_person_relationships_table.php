<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('person_relationships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('partner_id');
            $table->enum('relationship_type', ['partnership', 'married', 'divorced', 'widowed']);

            $table->unique(['person_id', 'partner_id']);

            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
            $table->foreign('partner_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_relationships');
    }
};
