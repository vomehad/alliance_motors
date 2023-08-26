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
use stdClass;

class CarService
{
    public function getAll(array $params): LengthAwarePaginator
    {
        $relations = [
            'pictures',
            'kpp',
            'body',
            'currency',
            'color',
            'generation',
            'model.brand',
        ];

        $query = Car::query()->with($relations);

        if (Arr::get($params, 'brand')) {
            $brands = explode(',', Arr::get($params, 'brand'));
            $query->whereHas('model', function (Builder $q) use ($brands) {
                return $q->whereIn('brand_id', $brands);
            });
        }

        if (Arr::get($params, 'model')) {
            $models = explode(',', Arr::get($params, 'model'));
            $query->whereIn('model_id', $models);
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
            $query->whereIn('wheel_drive', $drive);
        }

        if (Arr::get($params, 'kpp')) {
            $kppType = array_filter(explode(',', Arr::get($params, 'kpp')));
            $query->where('kpp', $kppType);
        }

        if (Arr::get($params, 'fuel')) {
            $fuel = array_filter(explode(',', Arr::get($params, 'fuel')));
            $query->whereIn('fuel', $fuel);
        }

        return $query->paginate();
    }

    public function getOneById(int $id): Car|EloquentModel
    {
        $relations = [
            'pictures',
            'kpp',
            'body',
            'currency',
            'color',
            'generation',
            'model.brand',
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

    public function parseSource(StdClass $source): CarDto
    {
        $dto = new CarDto();

        $dto->vin = $source->vin;
        $dto->year = $source->year;
        $dto->registry_year = $source->registry_year;
        $dto->doors_count = $source->doors_count;
        $dto->price = $source->price;
        $dto->description = $source->description;
        $dto->availability = $source->availability;
        $dto->url = $source->url;
        $dto->vehicle_mileage = $source->run;
        $dto->steering_wheel = $source->wheel;
        $dto->pts = $source->pts;
        $dto->pts_owners = $source->owners_number;
        $dto->wheel_drive = $source->drive;

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
