<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class MainController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('pages.main');
    }

    public function toAdmin(): Redirector|Application|RedirectResponse
    {
        return redirect('admin');
    }
}
