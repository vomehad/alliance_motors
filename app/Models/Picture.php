<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;

/**
 * Class Picture
 * @package App\Models
 *
 * @property int $id
 * @property string $origin_name
 * @property string $src
 * @property string $entity
 * @property string $entity_id
 */
class Picture extends Model
{
    use AsSource, HasFactory, SoftDeletes, Attachable;

    protected $table = 'pictures';

    protected $fillable = [
        'origin_name',
        'src',
        'entity',
        'entity_id',
    ];

    public function picturable()
    {
        return $this->morphTo();
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'image_id', 'id');
    }
}
