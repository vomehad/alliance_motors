<?php


namespace App\Services;


use App\Dto\ExpertDto;
use Illuminate\Support\Arr;
use stdClass;

class ExpertService
{
    const CM_EXPERT_URL = 'https://media.cm.expert/stock/export/cmexpert/yml/all/f435138a516b22adae4aea5ddea11706.xml';
    const CM_EXPERT_STOCK_URL = 'https://media.cm.expert/stock/export/cmexpert/dealer.site/all/all/00ffc4eb95a3886dc371e5923d2a5608.xml';

    public function getAutos(): array
    {
        $xmlFile = file_get_contents(self::CM_EXPERT_URL);

        $xmlObject = simplexml_load_string($xmlFile);

        $jsonFormatData = json_encode($xmlObject);

        $result = json_decode($jsonFormatData, true);

        return Arr::get($result, 'shop.offers.offer');
    }

    public function getAutoStock()
    {
        $xml = file_get_contents(self::CM_EXPERT_STOCK_URL);
        $object = simplexml_load_string($xml);
        $json = json_encode($object);
        $result = json_decode($json, true);

        return Arr::get($result, 'cars.car');
    }

    public function parseSource(array $auto): ExpertDto
    {
        $params = Arr::get($auto, 'param');

        $source = new ExpertDto();

        $source->expertId = Arr::get($auto, '@attributes.id');
        $source->brand = Arr::get($auto, 'vendor');
        $source->configuration = Arr::get($auto, 'model');
        $source->model = end($params);
        $source->generation = prev($params);
        $source->kpp = prev($params);
        $source->body = $params[2];
        $source->color = $params[4];
        $source->currency = Arr::get($auto, 'currencyId');
        $source->mileage = reset($params);
        $source->year = next($params);
        $source->steeringWheel = array_reverse($params)[3];

        return $source;
    }

    public function parseStock(array $data): ExpertDto
    {
        $dto = new ExpertDto();

        $dto->expertId = Arr::get($data, 'unique_id');
        $dto->brand = Arr::get($data, 'mark_id');
        $dto->model = Arr::get($data, "folder_id") ?? Arr::get($data, 'group_id');
        $dto->configuration = Arr::get($data, 'modification_id') ?? 'default';
        $dto->description = Arr::get($data, 'description');
        $dto->kpp = Arr::get($data, 'gearbox');
        $dto->body = Arr::get($data, "body_type");
        $dto->color = Arr::get($data, 'color');
        $dto->currency = Arr::get($data, 'currency');
        $dto->mileage = Arr::get($data, 'run');
        $dto->year = Arr::get($data, 'year');
        $dto->steeringWheel = Arr::get($data, 'wheel');
        $dto->extras = json_encode(Arr::get($data, 'extras'));
        $dto->engine_power = Arr::get($data, 'engine_power');
        $dto->engine_volume = Arr::get($data, 'engine_volume');
        $dto->engine_type = Arr::get($data, 'engine_type');

        return $dto;
    }
}
