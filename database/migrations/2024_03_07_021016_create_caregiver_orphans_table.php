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
        Schema::create('caregiver_orphans', function (Blueprint $table) {
            $table->unsignedBigInteger('orphan_id');
            $table->unsignedBigInteger('caregiver_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caregiver_orphans');
    }
};
