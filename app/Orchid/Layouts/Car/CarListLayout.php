<?php


namespace App\Orchid\Layouts\Car;


use App\Models\Car;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CarListLayout extends Table
{
    protected $target = 'cars';

    /**
     * @inheritDoc
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'Авто')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn(Car $car) => new Persona($car->presenter()))
            ,

            TD::make('vehicle_configuration_id', 'Комплектация')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn(Car $car) => $car->configuration->name)
            ,

            TD::make('year', 'Год выпуска')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
            ,

            TD::make('price', 'Цена')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Car $car) => $car->getPrice())
            ,

            TD::make('availability','Наличие')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
            ,

            TD::make('vehicle_mileage','Пробег')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Car $car) => $car->getMileage())
            ,

            TD::make('wheel_drive','Привод')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
            ,

            TD::make('kpp_type_id','КПП')
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Car $car) => $car->kpp->name)
            ,

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Car $car) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                        Link::make(__('Edit'))
//                            ->route()
                            ->icon('bs.pencil'),
                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Delete Car'))
                            ->method('remove', [
                                'id' => $car->id
                            ])
                    ])),
        ];
    }
}
