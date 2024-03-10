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
        Schema::create('education_programs_orphans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orphan_id');
            $table->foreign('orphan_id')->references('id')->on('orphans');
            $table->unsignedBigInteger('education_program_id');
            $table->foreign('education_program_id')->references('id')->on('education_programs');
            $table->date("enrollment_date");
            $table->string("class_grade");
            $table->date("completion_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_programs_orphans');
    }
};
