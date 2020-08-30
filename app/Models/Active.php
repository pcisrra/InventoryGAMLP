<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Active extends Model
{
    use SoftDeletes;

    public $table = 'actives';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'classification',
        'description',
        'cost',
        'observations',
        'condition',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function ubications()
    {
        return $this->belongsToMany(Location::class);
    }
}
