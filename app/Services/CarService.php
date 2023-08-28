<?php


namespace App\Services;


use App\Dto\CarDto;
use App\Dto\ExpertDto;
use App\Models\Car;
use App\Models\Picture;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Arr;

class CarService
{
    const DRIVE = [
        'fwd' => 'Передний',
        'rwd' => 'Задний',
        'awd' => 'Полный',
    ];
    const FUEL = [
        'benzin' => 'Бензин',
        'electro' => 'Электро',
        'diesel' => 'Дизель',
        'hybrid' => 'Гибрид',
        'hbo' => 'ГБО',
    ];

    public function getAll(array $params): LengthAwarePaginator
    {
        $relations = [
            'currency',
            'body',
            'color',
            'kpp',
            'configuration.model.brand',
            'configuration.engine',
            'pictures',
        ];

        $query = Car::query()->with($relations);

        if (Arr::get($params, 'brand')) {
            $brands = explode(',', Arr::get($params, 'brand'));
            $query->whereHas('configuration.model', function (Builder $q) use ($brands) {
                return $q->whereIn('brand_id', $brands);
            });
        }

        if (Arr::get($params, 'model')) {
            $models = explode(',', Arr::get($params, 'model'));
            $query->whereHas('configuration.model', function (Builder $q) use ($models) {
                return $q->whereIn('id', $models);
            });
        }

        if (Arr::get($params, 'year')) {
            [$from, $to] = explode(',', Arr::get($params, 'year'));
            if ($from) {
                $query->where('year', '>=', $from);
            }
            if ($to) {
                $query->where('year', '<=', $to);
            }
        }

        if (Arr::get($params, 'price')) {
            [$from, $to] = explode(',', Arr::get($params, 'price'));
            if ($from) {
                $query->where('price', '>=', $from);
            }
            if ($to) {
                $query->where('price', '<=', $to);
            }
        }

        if (Arr::get($params, 'mileage')) {
            [$from, $to] = explode(',', Arr::get($params, 'mileage'));
            if ($from) {
                $query->where('vehicle_mileage', '>=', $from);
            }
            if ($to) {
                $query->where('vehicle_mileage', '<=', $to);
            }
        }

        if (Arr::get($params, 'wheel_drive')) {
            $drive = array_filter(explode(',', Arr::get($params, 'wheel_drive')));
            $drive = array_map(fn ($type) => self::DRIVE[$type], $drive);
            $query->whereIn('wheel_drive', $drive);
        }

        if (Arr::get($params, 'kpp')) {
            $kppType = array_filter(explode(',', Arr::get($params, 'kpp')));
            $query->whereHas('kpp', function(Builder $q) use ($kppType) {
                return $q->whereIn('type', $kppType);
            });
        }

        if (Arr::get($params, 'fuel')) {
            $fuel = array_filter(explode(',', Arr::get($params, 'fuel')));
            $fuel = array_map(fn ($type) => self::FUEL[$type], $fuel);

            $query->whereHas('configuration.engine', function (Builder $q) use ($fuel) {
                $q->whereIn('type', $fuel);
            });
        }

        return $query->paginate(9);
    }

    public function getOneById(int $id): Car|EloquentModel
    {
        $relations = [
            'currency',
            'body',
            'color',
            'kpp',
            'configuration.model.brand',
            'configuration.engine',
            'pictures',
        ];

        return Car::query()->with($relations)->where(['id' => $id])->first();
    }

    public function getCar(string $expertId): ?EloquentModel
    {
        return Car::query()->where(['expert_id' => $expertId])->first();
    }

    public function createCar(CarDto $dto, ExpertDto $expertDto): Car
    {
        $car = new Car();

        $car->fill(array_merge($dto->toArray(), ['expert_id' => $expertDto->expertId]));

        $car->save();

        return $car;
    }

    public function updateCar(CarDto $dto, EloquentModel $car): Car|EloquentModel
    {
        $car->fill($dto->toArray());

        $car->update();

        return $car;
    }

    public function parseSource(array $source): CarDto
    {
        $dto = new CarDto();

        $dto->vin = Arr::get($source, 'vin');
        $dto->year = Arr::get($source, 'year');
        $dto->registry_year = Arr::get($source, 'registry_year');
        $dto->doors_count = Arr::get($source, 'doors_count');
        $dto->price = Arr::get($source, 'price');
        $dto->description = Arr::get($source, 'description');
        $dto->availability = Arr::get($source, 'availability');
        $dto->url = Arr::get($source, 'url');
        $dto->vehicle_mileage = Arr::get($source, 'run');
        $dto->steering_wheel = Arr::get($source, 'wheel');
        $dto->pts = Arr::get($source, 'pts');
        $dto->pts_owners = Arr::get($source, 'owners_number');
        $dto->wheel_drive = Arr::get($source, 'drive');

        return $dto;
    }

    public function parseStock(array $source)
    {

    }

    public function addPictures(array $pictures, Car $car)
    {
        foreach ($pictures as $img) {
            $picture = Picture::firstOrCreate([
                'origin_name' => $img,
                'src' => $img,
                'entity' => Car::class,
                'entity_id' => $car->id,
            ]);
        }
    }
}
