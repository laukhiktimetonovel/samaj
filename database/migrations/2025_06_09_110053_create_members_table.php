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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')
                  ->nullable()
                  ->constrained('members')
                  ->onDelete('cascade');      // cascade delete children if parent deleted
            $table->unsignedInteger('sequence')->default(0);
            $table->string('relation')->nullable();
            $table->string('full_name');
            $table->string('mobile')->nullable();
            $table->date('birth_date')->nullable();
            $table->text('current_address')->nullable();
            $table->text('village_address')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_address')->nullable();
            $table->string('education')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('gender')->default('male');
            $table->string('marital_status')->nullable();
            $table->string('mosal_name')->nullable();
            $table->string('mosal_branch')->nullable();
            $table->string('mosal_village')->nullable();
            $table->string('village_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
