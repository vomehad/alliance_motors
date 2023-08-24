<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $engine_volume
 * @property string $engine_power
 * @property int $vehicle_configuration_id
 * @property string $type
 * @property bool $active
 *
 * @property VehicleConfiguration $configuration
 */
class Engine extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'engines';

    protected $fillable = [
        'engine_volume',
        'engine_power',
        'vehicle_configuration_id',
        'type',
    ];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function configuration(): BelongsTo
    {
        return $this->belongsTo(VehicleConfiguration::class);
    }
}
