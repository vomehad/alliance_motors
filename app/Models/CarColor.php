<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CarColor
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 */
class CarColor extends EloquentModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'car_colors';

    protected $fillable = [
        'name',
    ];

    public function car(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
