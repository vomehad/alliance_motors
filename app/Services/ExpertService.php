<?php


namespace App\Services;


use App\Dto\ExpertDto;
use Illuminate\Support\Arr;

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
        $result = json_decode($json);

        return $result->cars->car;
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
