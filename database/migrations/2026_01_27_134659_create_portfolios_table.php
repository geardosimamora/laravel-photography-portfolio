<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category'); // Menyimpan value dari Enum
            $table->string('client_name')->nullable();
            $table->text('description')->nullable(); // Rich Text Editor
            $table->date('project_date');
            $table->string('video_url')->nullable(); // Link Youtube/Vimeo
            $table->text('google_maps_embed')->nullable(); // HTML Iframe Maps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};