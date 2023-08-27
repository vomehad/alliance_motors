<?php


namespace App\Dto;

/**
 * Class ExpertDto
 * @package App\Dto
 *
 * @property string $expertId
 * @property string $brand
 * @property string $model
 * @property string $generation
 * @property string $configuration
 * @property string $description
 * @property string $kpp
 * @property string $body
 * @property string $color
 * @property string $currency
 * @property string $mileage
 * @property string $year
 * @property string $steeringWheel
 * @property string $extras
 * @property string $engine_volume
 * @property string $engine_power
 * @property string $engine_type
 */
class ExpertDto
{
    public ?string $expertId;
    public ?string $brand;
    public ?string $model;
    public ?string $generation;
    public ?string $configuration;
    public ?string $description;
    public ?string $kpp;
    public ?string $body;
    public ?string $color;
    public ?string $currency;
    public ?string $mileage;
    public ?string $steeringWheel;
    public ?string $extras;
    public ?string $engine_volume;
    public ?string $engine_power;
    public ?string $engine_type;
}
