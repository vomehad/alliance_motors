<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageAboutSettingCollection;
use App\Services\SiteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

class SettingController extends Controller
{
    private SiteService $siteService;

    public function __construct(SiteService $siteService)
    {
        $this->siteService = $siteService;
    }

    public function main()
    {
        return $this->siteService->getSettings();
    }

    public function about(): JsonResponse
    {
        return (new PageAboutSettingCollection($this->siteService->pageAbout()))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
}
