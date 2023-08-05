<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends EloquentModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'cars';

    protected $fillable = [
        'name',
        'count',
        'price',
        'currency_id',
        'pickup',
        'store',
        'description',
        'url',
        'vehicle_mileage',
        'year',
        'car_body_id',
        'steering_wheel',
        'car_color_id',
        'pts',
        'pts_owners',
        'engine',
        'wheel_drive',
        'kpp_type_id',
        'generation_id',
        'model_id',
    ];

    protected $casts = [
        'price' => 'integer',
        'pickup' => 'boolean',
        'store' => 'boolean',
    ];

    //====================== relations =====================================
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function body(): BelongsTo
    {
        return $this->belongsTo(CarBody::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(CarColor::class);
    }

    public function kpp(): BelongsTo
    {
        return $this->belongsTo(KppType::class);
    }

    public function generation(): BelongsTo
    {
        return $this->belongsTo(Generation::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(Model::class);
    }
// ============================= end relations ===================================
}
