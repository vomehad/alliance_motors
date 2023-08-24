<?php

namespace App\Http\Controllers;

use App\Services\ExpertService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getCars()
    {
        $service = new ExpertService();
        $autos = $service->getAutoStock();

        foreach ($autos as $auto) {
            dd($auto);
        }
    }
}
