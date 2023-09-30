<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;

class Picture extends Model
{
    use HasFactory, SoftDeletes, Attachable;

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
