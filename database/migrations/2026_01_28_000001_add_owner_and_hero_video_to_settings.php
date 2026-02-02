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
        Schema::table('settings', function (Blueprint $table) {
            // Owner Profile
            $table->string('owner_name')->nullable()->after('site_name');
            $table->text('owner_bio')->nullable()->after('owner_name');
            $table->string('owner_instagram')->nullable()->after('owner_bio');
            
            // Hero Video
            $table->string('hero_video_url')->nullable()->after('owner_instagram');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['owner_name', 'owner_bio', 'owner_instagram', 'hero_video_url']);
        });
    }
};
