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
            $table->string('vin');
            $table->tinyText('year');
            $table->tinyText('registry_year')->nullable();
            $table->tinyInteger('doors_count');
            $table->string('price');
            $table->string('expert_id')->index();
            $table->text('description');
            $table->string('availability')->nullable();
            $table->tinyText('url')->nullable();
            $table->tinyText('vehicle_mileage')->nullable();
            $table->tinyText('steering_wheel');
            $table->tinyText('pts')->nullable();
            $table->string('pts_owners');
            $table->tinyText('wheel_drive');
            $table->foreignId('currency_id')->constrained('currencies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('car_body_id')->constrained('car_bodies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('car_color_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kpp_type_id')->constrained('kpp_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('vehicle_configuration_id')->constrained('vehicle_configurations')->cascadeOnUpdate()->cascadeOnDelete();
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