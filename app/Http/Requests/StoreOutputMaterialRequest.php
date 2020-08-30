<?php

namespace App\Http\Requests;

use App\Models\OutputMaterial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOutputMaterialRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('output_material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'observations'    => [
                'string',
                'nullable',
            ],
            'date_sol'        => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'ots'             => [
                'string',
                'nullable',
            ],
            'output_unity'    => [
                'string',
                'nullable',
            ],
            'output_quantity' => [
                'numeric',
            ],
        ];
    }
}
