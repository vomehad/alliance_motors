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
 * @property string $vin
 * @property int $year
 * @property int $registry_year
 * @property int $doors_count
 * @property int $price
 * @property string $description
 * @property string $availability
 * @property string $url
 * @property int $vehicle_mileage
 * @property string $steering_wheel
 * @property string $pts
 * @property string $pts_owners
 * @property string $wheel_drive
 *
 * @property int $configuration_id
 * @property int $currency_id
 * @property int $car_color_id
 * @property int $car_body_id
 * @property int $kpp_id
 */
class CarDto
{
    public ?string $vin;
    public ?int $year;
    public ?int $registry_year;
    public ?int $doors_count;
    public ?int $price;
    public ?string $description;
    public ?string $availability;
    public ?string $url;
    public ?int $vehicle_mileage;
    public ?string $steering_wheel;
    public ?string $pts;
    public ?string $pts_owners;
    public ?string $wheel_drive;

    public ?int $configuration_id;
    public ?int $currency_id;
    public ?int $car_color_id;
    public ?int $car_body_id;
    public ?int $kpp_id;

    public function toArray(): array
    {
        return [
            'vin' => $this->vin,
            'year' => $this->year,
            'registry_year' => $this->registry_year,
            'doors_count' => $this->doors_count,
            'price' => $this->price,
            'description' => $this->description,
            'availability' => $this->availability,
            'url' => $this->url,
            'vehicle_mileage' => $this->vehicle_mileage,
            'steering_wheel' => $this->steering_wheel,
            'pts' => $this->pts,
            'pts_owners' => $this->pts_owners,
            'wheel_drive' => $this->wheel_drive,
            'vehicle_configuration_id' => $this->configuration_id,
            'currency_id' => $this->currency_id,
            'car_body_id' => $this->car_body_id,
            'car_color_id' => $this->car_color_id,
            'kpp_type_id' => $this->kpp_id,
        ];
    }
}
