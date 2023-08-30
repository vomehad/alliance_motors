<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Orchid\Screen\AsSource;

class Vacancy extends EloquentModel
{
    use AsSource;

    protected $table = 'vacancies';
}
