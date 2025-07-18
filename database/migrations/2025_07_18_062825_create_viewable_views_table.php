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
        Schema::create('viewable_views', function (Blueprint $table) {
            $table->id();
            $table->morphs('viewable');
            $table->string('ip_address');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamp('viewed_at');
            $table->timestamps();

            $table->unique(['viewable_id', 'viewable_type', 'ip_address']);
            $table->unique(['viewable_id', 'viewable_type', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viewable_views');
    }
};
