<?php

namespace App\Models;

use App\Orchid\Presenters\CarPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Screen\AsSource;

/**
 * Class Car
 * @package App\Models
 *
 * @property int $id
 * @property string $vin
 * @property string $year
 * @property string $registry_year
 * @property int $doors_count
 * @property int $price
 * @property string $expert_id
 * @property string $description
 * @property bool $availability
 * @property string $url
 * @property int $vehicle_mileage
 * @property string $steering_wheel
 * @property string $pts
 * @property int $pts_owners
 * @property string $wheel_drive
 * @property int $currency_id
 * @property int $engine_id
 * @property int $car_body_id
 * @property int $car_color_id
 * @property int $kpp_type_id
 * @property int $vehicle_configuration_id
 * @property boolean $active
 *
 * @property Currency $currency
 * @property Engine $engine
 * @property CarBody $body
 * @property CarColor $color
 * @property KppType $kpp
 * @property VehicleConfiguration $configuration
 * @property Picture[]|Collection $pictures
 */
class Car extends EloquentModel
{
    use HasFactory, SoftDeletes, AsSource, Filterable;

    protected $table = 'cars';

    protected $fillable = [
        'vin',
        'year',
        'registry_year',
        'doors_count',
        'price',
        'expert_id',
        'description',
        'availability',
        'url',
        'vehicle_mileage',
        'steering_wheel',
        'pts',
        'pts_owners',
        'wheel_drive',
        'currency_id',
        'car_body_id',
        'car_color_id',
        'kpp_type_id',
        'vehicle_configuration_id',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id' => Where::class,
        'name' => Like::class,
        'email' => Like::class,
        'updated_at' => WhereDateStartEnd::class,
        'created_at' => WhereDateStartEnd::class,
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'email',
        'updated_at',
        'created_at',
    ];

    public function presenter()
    {
        return new CarPresenter($this);
    }

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

    public function configuration(): BelongsTo
    {
        return $this->belongsTo(VehicleConfiguration::class, 'vehicle_configuration_id', 'id');
    }

    public function pictures(): MorphMany
    {
        return $this->morphMany(Picture::class, 'picturable', 'entity', 'entity_id')->orderBy('sort', 'ASC');
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
        [$fuel, $v, $power] = explode(',', $this->engine);

        return trim($fuel);
    }

    public function getMotorType(): string
    {
        [$fuel, $v, $power] = explode(',', $this->engine);

        return trim($v) . ', ' . trim($power);
    }
}
