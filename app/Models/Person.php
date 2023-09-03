<?php

namespace App\Models;

use App\Orchid\Presenters\PersonPresenter;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
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
 * @property string $department
 * @property Attachment[] $attachment
 */
class Person extends Authenticatable
{
    use AsSource, Attachable;

    const SALES_DEPARTMENT = 1;
    const SALES_DEPARTMENT_NAME = 'ОТДЕЛ ПРОДАЖ';
    const CREDIT_DEPARTMENT = 2;
    const CREDIT_DEPARTMENT_NAME = 'ОТДЕЛ КРЕДИТОВАНИЯ И СТРАХОВАНИЯ';

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
        'department',
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

    public function picture(): HasOne
    {
        return $this->hasOne(Picture::class, 'id', 'image_id');
    }

    public function pictures(): MorphMany
    {
        return $this->morphMany(Picture::class, 'picturable', 'entity', 'entity_id');
    }

    public function getPhoto()
    {
        return $this->attachment()->first();
    }
}
