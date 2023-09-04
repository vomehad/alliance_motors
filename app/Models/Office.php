<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Orchid\Screen\AsSource;

class Office extends EloquentModel
{
    use AsSource;

    protected $fillable = [
        'address',
        'tel',
        'geo',
        'email',
    ];
}
