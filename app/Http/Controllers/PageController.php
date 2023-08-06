<?php


namespace App\Http\Controllers;


use App\Services\CarService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    private CarService $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function index(): View|Factory|Application
    {
        $cars = $this->carService->getAll();

        return view('index', [
            'cars' => $cars,
        ]);
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

    public function detail(int $id): View|Factory|Application
    {
        $car = $this->carService->getOneById($id);

        return view('detail', [
            'car' => $car,
        ]);
    }
}
