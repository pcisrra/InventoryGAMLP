<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;

    public $table = 'materials';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'description',
        'unity',
        'quantity',
        'unitary_cost',
        'total_cost',
        'localization_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function localization()
    {
        return $this->belongsTo(Location::class, 'localization_id');
    }
}
