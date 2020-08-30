<?php

namespace App\Http\Requests;

use App\Models\Material;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMaterialRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code'            => [
                'string',
                'required',
            ],
            'description'     => [
                'string',
                'required',
            ],
            'unity'           => [
                'string',
                'max:20',
                'nullable',
            ],
            'quantity'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'unitary_cost'    => [
                'numeric',
            ],
            'total_cost'      => [
                'numeric',
            ],
            'localization_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
