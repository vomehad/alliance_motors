<?php


namespace App\Orchid\Screens\Car;


use App\Models\Car;
use App\Orchid\Layouts\Car\CarListLayout;
use App\Services\CarService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use JetBrains\PhpStorm\ArrayShape;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class CarListScreen extends Screen
{
    private CarService $service;

    public function __construct(CarService $service)
    {
        $this->service = $service;
    }

    #[ArrayShape([
        'cars' => LengthAwarePaginator::class
    ])] public function query(): iterable
    {
        return [
            'cars' => $this->service->getAll([]),
        ];
    }

    public function name(): ?string
    {
        return 'Car Management';
    }

    public function description(): ?string
    {
        return 'Cars';
    }

    public function commandBar(): iterable
    {
        return [
            Link::make(__("Add"))
                ->icon('bs.plus-circle')
//                ->route('platform.system.users.create')
        ];
    }

    public function layout(): iterable
    {
        return [
            CarListLayout::class,
        ];
    }
}
