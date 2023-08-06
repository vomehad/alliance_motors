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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('count');
            $table->string('price');
            $table->string('expert_id')->index();
            $table->foreignId('currency_id')->constrained('currencies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('delivery')->nullable();
            $table->boolean('pickup')->nullable();
            $table->boolean('store')->nullable();
            $table->text('description')->nullable();
            $table->tinyText('url')->nullable();
            $table->tinyText('vehicle_mileage')->nullable();
            $table->tinyText('year');
            $table->foreignId('car_body_id')->constrained('car_bodies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->tinyText('steering_wheel');
            $table->foreignId('car_color_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->tinyText('pts')->nullable();
            $table->tinyInteger('pts_owners');
            $table->string('engine');
            $table->tinyText('wheel_drive');
            $table->foreignId('kpp_type_id')->constrained('kpp_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('generation_id')->constrained('generations')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('model_id')->constrained('models')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
