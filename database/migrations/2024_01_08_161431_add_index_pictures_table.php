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
        Schema::table('pictures', function (Blueprint $table) {
            $table->index('src');
            $table->index('entity');
            $table->index('entity_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pictures', function (Blueprint $table) {
            $table->dropIndex('pictures_src_index');
            $table->dropIndex('pictures_entity_index');
            $table->dropIndex('pictures_entity_id_index');
        });
    }
};
