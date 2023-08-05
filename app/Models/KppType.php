<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class KppType extends EloquentModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'kpp_types';

    protected $fillable = [
        'name',
    ];

    public function car(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
