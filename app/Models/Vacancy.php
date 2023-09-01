<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Orchid\Screen\AsSource;

/**
 * Class Vacancy
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $requirements
 * @property string $conditions
 * @property int $min
 * @property int $max
 * @property bool $active
 */
class Vacancy extends EloquentModel
{
    use AsSource;

    protected $table = 'vacancies';

    protected $fillable = [
        'title',
        'description',
        'requirements',
        'conditions',
        'min',
        'max',
        'active',
    ];
}
