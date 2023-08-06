<?php


namespace App\Http\Controllers;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function index(): View|Factory|Application
    {
        return view('index');
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
}
