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
        Schema::create('orphans', function (Blueprint $table) {
            $table->id();
            $table->string("image")->nullable();
            $table->string("firstname");
            $table->string("lastname");
            $table->date("date_of_birth");
            $table->string("gender");
            $table->date("entry_date");
            $table->date("exit_date")->nullable();
            $table->text("notes")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orphans');
    }
};
