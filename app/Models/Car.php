<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Car
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property int $count
 * @property int $price
 * @property bool $pickup
 * @property bool $store
 * @property string $description
 * @property string $url
 * @property int $vehicle_mileage
 * @property int $year
 * @property string $steering_wheel
 * @property string $pts
 * @property int $pts_owners
 * @property string $engine
 * @property string $wheel_drive
 *
 * @property Model $model
 * @property Generation $generation
 * @property KppType $kppType
 * @property CarColor $carColor
 * @property CarBody $carBody
 * @property Currency $currency
 */
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
        'expert_id',
    ];

//====================== relations =====================================
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function body(): BelongsTo
    {
        return $this->belongsTo(CarBody::class, 'car_body_id', 'id');
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(CarColor::class, 'car_color_id', 'id');
    }

    public function kpp(): BelongsTo
    {
        return $this->belongsTo(KppType::class, 'kpp_type_id', 'id');
    }

    public function generation(): BelongsTo
    {
        return $this->belongsTo(Generation::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(Model::class);
    }

    public function pictures(): MorphMany
    {
        return $this->morphMany(Picture::class, 'picturable', 'entity', 'entity_id');
    }
// ============================= end relations ===================================

    public function getMileage(): string
    {
        return "$this->vehicle_mileage км";
    }

    public function getPrice(): string
    {
        return "$this->price ₽";
    }

    public function getMinPrice(): string
    {
        $month = 7 * 12;
        $sum = $this->price / $month;

        $fullSum = round($sum + 0.07 * $sum, 0);

        return "$fullSum ₽ / мин. платеж";
    }

    public function getFuelType(): string
    {
        list($fuel, $v, $power) = explode(',', $this->engine);

        return trim($fuel);
    }

    public function getMotorType(): string
    {
        list($fuel, $v, $power) = explode(',', $this->engine);

        return trim($v) . ', ' . trim($power);
    }
}
