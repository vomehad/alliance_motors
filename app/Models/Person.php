<?php

namespace App\Models;

use App\Orchid\Presenters\PersonPresenter;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Platform\Models\User as Authenticatable;
use Orchid\Screen\AsSource;

/**
 * Class Person
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $job
 */
class Person extends Authenticatable
{
    use AsSource, Attachable;

    protected $table = 'persons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'job',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id' => Where::class,
        'name' => Like::class,
        'surname' => Like::class,
        'job' => Like::class,
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'name',
        'surname',
        'job',
    ];

    public function presenter()
    {
        return new PersonPresenter($this);
    }
}
