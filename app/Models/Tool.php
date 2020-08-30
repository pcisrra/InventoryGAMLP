<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tool extends Model
{
    use SoftDeletes;

    public $table = 'tools';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'description',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user_asignados()
    {
        return $this->belongsToMany(User::class);
    }
}
