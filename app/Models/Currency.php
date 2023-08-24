<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Currency
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 *
 * @property Car[] $cars
 */
class Currency extends EloquentModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'currencies';

    protected $fillable = [
        'name',
    ];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
