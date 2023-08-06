<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
    use HasFactory, SoftDeletes;

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
}
