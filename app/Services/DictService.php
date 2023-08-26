<?php


namespace App\Services;


use App\Dto\ExpertDto;
use App\Models\Brand;
use App\Models\CarBody;
use App\Models\CarColor;
use App\Models\Currency;
use App\Models\Generation;
use App\Models\KppType;
use App\Models\Model;
use App\Models\VehicleConfiguration;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class DictService
{
    public function createBrand(ExpertDto $dto): Brand
    {
        return Brand::firstOrCreate(['name' => $dto->brand]);
    }

    public function createModel(ExpertDto $dto, Brand $brand): Model
    {
        return Model::firstOrCreate([
            'name' => $dto->model,
            'brand_id' => $brand->id,
        ]);
    }

    public function createGeneration(ExpertDto $dto, Model $model): Generation
    {
        return Generation::firstOrCreate([
            'name' => $dto->generation,
            'model_id' => $model->id,
        ]);
    }

    public function createConfiguration(ExpertDto $dto, Model $model): VehicleConfiguration
    {
        return VehicleConfiguration::firstOrCreate([
            'name' => $dto->configuration,
            'description' => $dto->extras,
            'model_id' => $model->id,
        ]);
    }

    public function createKppType(ExpertDto $dto): KppType
    {
        return KppType::firstOrCreate(['name' => $dto->kpp]);
    }

    public function createCarBody(ExpertDto $dto): CarBody
    {
        return CarBody::firstOrCreate(['name' => $dto->body]);
    }

    public function createCarColor(ExpertDto $dto): CarColor
    {
        return CarColor::firstOrCreate(['name' => $dto->color]);
    }

    public function createCurrency(ExpertDto $dto): Currency
    {
        return Currency::firstOrCreate(['name' => $dto->currency]);
    }

    public function getBrandList(): Collection
    {
        $brands = Brand::query()
            ->where(['active' => true])
            ->orderBy('name')
            ->get();

        $first = new StdClass();
        $first->id = 0;
        $first->name = 'все марки';
        $brands->prepend($first);

        return $brands;
    }

    public function getModelsByBrands(string $ids): Collection
    {
        $brandIds = explode(',', $ids);

        $models = Model::query()
            ->whereIn('brand_id', $brandIds)
            ->orderBy('name')
            ->get();

        $first = new StdClass();
        $first->id = 0;
        $first->name = 'все модели';
        $models->prepend($first);

        return $models;
    }

    public function getKppTypes(): Collection
    {
        return KppType::query()->get();
    }
}
