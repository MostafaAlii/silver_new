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
        Schema::create('privacy_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale');
            $table->string('note')->nullable();
            $table->unique(['privacy_id', 'locale']);
            $table->index(['privacy_id', 'locale']);
            $table->foreignId('privacy_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacy_translations');
    }
};
