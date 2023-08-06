<?php


namespace App\Dto;

use App\Models\Brand;
use App\Models\CarBody;
use App\Models\CarColor;
use App\Models\Currency;
use App\Models\Generation;
use App\Models\KppType;
use App\Models\Model;

/**
 * Class CarDto
 * @package App\Dto
 *
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
class CarDto
{
    public ?string $name;
    public ?int $count;
    public ?int $price;
    public ?bool $pickup;
    public ?bool $store;
    public ?string $description;
    public ?string $url;
    public ?int $vehicle_mileage;
    public ?int $year;
    public ?string $steering_wheel;
    public ?string $pts;
    public ?int $pts_owners;
    public ?string $engine;
    public ?string $wheel_drive;

    public ?Model $model;
    public ?Generation $generation;
    public ?KppType $kppType;
    public ?CarColor $carColor;
    public ?CarBody $carBody;
    public ?Currency $currency;

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'count' => $this->count,
            'price' => $this->price,
            'currency_id' => $this->currency->id,
            'pickup' => $this->pickup,
            'store' => $this->store,
            'description' => $this->description,
            'url' => $this->url,
            'vehicle_mileage' => $this->vehicle_mileage,
            'year' => $this->year,
            'car_body_id' => $this->carBody->id,
            'steering_wheel' => $this->steering_wheel,
            'car_color_id' => $this->carColor->id,
            'pts' => $this->pts,
            'pts_owners' => $this->pts_owners,
            'engine' => $this->engine,
            'wheel_drive' => $this->wheel_drive,
            'kpp_type_id' => $this->kppType->id,
            'generation_id' => $this->generation->id,
            'model_id' => $this->model->id,
            'expert_id' => $this->model->id,
        ];
    }
}
