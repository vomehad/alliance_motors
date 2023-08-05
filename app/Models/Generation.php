<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Generation extends EloquentModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'model_id',
    ];

    public function car(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(Model::class);
    }

    public function vehicleConfiguration(): HasMany
    {
        return $this->hasMany(VehicleConfiguration::class);
    }
}
