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
        Schema::table('abouts', function (Blueprint $table) {
            // Change 'quote' column to text
            $table->longText('quote')->change();

            // Change 'description' column to text
            $table->longText('description')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            // Revert 'quote' column back to string
            $table->string('quote')->change();

            // Revert 'description' column back to string
            $table->string('description')->change();
        });
    }
};