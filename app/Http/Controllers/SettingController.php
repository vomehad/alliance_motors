<?php

namespace App\Http\Controllers;

use App\Services\SiteService;
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

    public function about(): Collection
    {
        return $this->siteService->pageAbout();
    }
}
