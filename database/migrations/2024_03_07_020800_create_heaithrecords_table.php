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
        Schema::create('heaithrecords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orphan_id');
            $table->foreign('orphan_id')->references('id')->on('orphans');
            $table->date("record_date");
            $table->text("medical_condition");
            $table->text("vaccinations");
            $table->text("notes")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heaithrecords');
    }
};
