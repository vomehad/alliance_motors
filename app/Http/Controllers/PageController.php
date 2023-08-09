<?php


namespace App\Http\Controllers;


use App\Services\CarService;
use App\Services\DictService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    private CarService $carService;

    private DictService $dictService;

    public function __construct(CarService $carService, DictService $dictService)
    {
        $this->carService = $carService;
        $this->dictService = $dictService;
    }

    public function index(): View|Factory|Application
    {
        $cars = $this->carService->getAll();
        $brands = $this->dictService->getBrandList();

        return view('index', [
            'cars' => $cars,
            'brands' => $brands
        ]);
    }

    public function catalog(): View|Factory|Application
    {
        $cars = $this->carService->getAll();

        return view('catalog', [
            'cars' => $cars,
        ]);
    }

    public function credit(): View|Factory|Application
    {
        $cars = $this->carService->getAll();

        return view('credit', [
            'cars' => $cars,
        ]);
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
