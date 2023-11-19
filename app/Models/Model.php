<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Model
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 *
 * @property Brand $brand
 */
class Model extends EloquentModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'models';

    protected $fillable = [
        'name',
        'brand_id',
    ];

    public function car(): HasMany
    {
        return $this->hasMany(Car::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
