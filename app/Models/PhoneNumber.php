<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Screen\AsSource;

/**
 * Class PhoneNumber
 *
 * @property int $id
 * @property string $name
 * @property string $number
 * @property string $type
 * @property string $description
 */
class PhoneNumber extends Model
{
    use HasFactory, AsSource, SoftDeletes;

    protected $table = 'phone_numbers';
}
