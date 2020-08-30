<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutputMaterial extends Model
{
    use SoftDeletes;

    public $table = 'output_materials';

    protected $dates = [
        'date_sol',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'observations',
        'date_sol',
        'ots',
        'output_unity',
        'output_quantity',
        'material_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDateSolAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateSolAttribute($value)
    {
        $this->attributes['date_sol'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
