<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Screen\AsSource;

class PageAboutSetting extends Model
{
    use HasFactory, SoftDeletes, AsSource;

    protected $table = 'page_about_settings';

    protected $fillable = [
        'name',
        'description',
        'value',
        'extra',
    ];
}
