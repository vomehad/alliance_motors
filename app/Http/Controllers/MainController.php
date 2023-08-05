<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarColor;
use App\Models\Currency;
use App\Models\Generation;
use App\Models\KppType;
use App\Models\Model;
use App\Models\VehicleConfiguration;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    public function index(): View|Factory|Application
    {
        return view('index');
    }

    public function catalog(): View|Factory|Application
    {
        return view('catalog');
    }

    public function credit(): View|Factory|Application
    {
        return view('credit');
    }

    public function about(): View|Factory|Application
    {
        return view('about');
    }

    public function contacts(): View|Factory|Application
    {
        return view('contacts');
    }

    public function privacy(): View|Factory|Application
    {
        return view('privacy');
    }

    public function xml()
    {
    $xmlFile = file_get_contents('https://media.cm.expert/stock/export/cmexpert/yml/all/f435138a516b22adae4aea5ddea11706.xml');

    $xmlObject = simplexml_load_string($xmlFile);

    $jsonFormatData = json_encode($xmlObject);
    $result = json_decode($jsonFormatData);

    $autos = $result->shop->offers->offer;

    try {
        foreach ($autos as $key => $auto) {
//            dd($auto);
            $params = $auto->param;
            $source['brand'] = $auto->vendor;
            $source['model'] = end($params);
            $source['generation'] = prev($params);
            $source['kpp'] = prev($params);
            $source['body'] = $params[2];
            $source['color'] = $params[4];
            $source['currency'] = $auto->currencyId;
            $source['mileage'] = reset($params);
            $source['year'] = next($params);
            $source['steering_wheel'] = next($params);
//        dump($source);
//        continue;
            $brand = Brand::firstOrCreate([
                'name' => $source['brand'],
            ]);
            $model = Model::firstOrCreate([
                'name' => $source['model'],
                'brand_id' => $brand->id,
            ]);
            $generation = Generation::firstOrCreate([
                'name' => $source['generation'],
                'model_id' => $model->id,
            ]);
            $configuration = VehicleConfiguration::firstOrCreate([
                'name' => $auto->model,
                'generation_id' => $generation->id,
            ]);
            $kppType = KppType::firstOrCreate([
                'name' => $source['kpp'],
            ]);
            $carBody = CarBody::firstOrCreate([
                'name' => $source['body'],
            ]);
            $carColor = CarColor::firstOrCreate([
                'name' => $source['color'],
            ]);
            $currency = Currency::firstOrCreate([
                'name' => $source['currency'],
            ]);
            $car = Car::firstOrCreate([
                'name' => $auto->name,
                'count' => $auto->count,
                'price' => $auto->price,
                'currency_id' => $currency->id,
                'pickup' => $auto->pickup,
                'store' => $auto->store,
                'description' => $auto->description,
                'url' => $auto->url,
                'vehicle_mileage' => $source['mileage'],
                'year' => $source['year'],
                'car_body_id' => $carBody->id,
                'steering_wheel' => $source['steering_wheel'],
                'car_color_id' => $carColor->id,
                'pts' => isset($params[11]) ? $params[5] : null,
                'pts_owners' => isset($params[11]) ? $params[6] : $params[5],
                'engine' => isset($params[11]) ? $params[7] : $params[6],
                'wheel_drive' => $params[3],
                'kpp_type_id' => $kppType->id,
                'generation_id' => $generation->id,
                'model_id' => $model->id,
            ]);

            if ($car) {
                dump("Обновлено $car->name");
            } else {
                dump("Ошибка $auto->name");
            }
        }
    } catch (\Throwable $ex) {
        dd($ex->getMessage());
    }
    dd('Обновление окончено');
    dd($result->shop->offers->offer);

    }
}
