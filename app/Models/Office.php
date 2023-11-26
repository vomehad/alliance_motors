<?php


namespace App\Models;

use App\Orchid\Presenters\OfficePresenter;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Orchid\Screen\AsSource;

/**
 * @property int $id
 * @property string $address
 * @property string $tel
 * @property string $geo
 * @property string $email
 * @property boolean $active
 */
class Office extends EloquentModel
{
    use AsSource;

    protected $fillable = [
        'address',
        'tel',
        'geo',
        'email',
        'active',
    ];

    public function presenter(): OfficePresenter
    {
        return new OfficePresenter($this);
    }
}
