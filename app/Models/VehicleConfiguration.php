<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $model_id
 *
 * @property Model $model
 * @property Engine $engine
 */
class VehicleConfiguration extends EloquentModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'vehicle_configurations';

    protected $fillable = [
        'name',
        'description',
        'model_id',
    ];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(Model::class);
    }

    public function engine(): HasOne
    {
        return $this->hasOne(Engine::class);
    }
}
