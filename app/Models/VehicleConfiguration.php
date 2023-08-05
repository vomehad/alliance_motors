<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleConfiguration extends EloquentModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'vehicle_configurations';

    protected $fillable = [
        'name',
        'generation_id',
    ];

    public function car(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function generation(): BelongsTo
    {
        return $this->belongsTo(Generation::class);
    }
}
