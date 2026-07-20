<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('article_category');
    }

    public function down(): void
    {
        // recreate if needed — see earlier migration for structure
    }
};
