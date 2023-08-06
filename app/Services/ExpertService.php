<?php


namespace App\Services;


use App\Dto\ExpertDto;
use Illuminate\Support\Arr;

class ExpertService
{
    const CM_EXPERT_URL = 'https://media.cm.expert/stock/export/cmexpert/yml/all/f435138a516b22adae4aea5ddea11706.xml';

    public function getAutos(): array
    {
        $xmlFile = file_get_contents(self::CM_EXPERT_URL);

        $xmlObject = simplexml_load_string($xmlFile);

        $jsonFormatData = json_encode($xmlObject);

        $result = json_decode($jsonFormatData, true);

        return Arr::get($result, 'shop.offers.offer');
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
}
