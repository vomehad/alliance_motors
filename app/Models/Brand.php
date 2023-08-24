<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Brand
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property boolean $active
 *
 * @property Model[] $models
 */
class Brand extends EloquentModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'brands';

    protected $fillable = [
        'name',
    ];

    public function models(): HasMany
    {
        return $this->hasMany(Model::class);
    }
}
