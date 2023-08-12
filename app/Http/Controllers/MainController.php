<?php

namespace App\Http\Controllers;

use App\Services\DictService;
use Illuminate\Database\Eloquent\Collection;

class MainController extends Controller
{
    private DictService $service;

    public function __construct(DictService $service)
    {
        $this->service = $service;
    }

    public function getBrands(): Collection
    {
        return $this->service->getBrandList();
    }
}
