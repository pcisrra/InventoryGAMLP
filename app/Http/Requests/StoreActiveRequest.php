<?php

namespace App\Http\Requests;

use App\Models\Active;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreActiveRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('active_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code'           => [
                'string',
                'required',
            ],
            'classification' => [
                'string',
                'nullable',
            ],
            'description'    => [
                'string',
                'nullable',
            ],
            'cost'           => [
                'string',
                'nullable',
            ],
            'ubications.*'   => [
                'integer',
            ],
            'ubications'     => [
                'required',
                'array',
            ],
            'observations'   => [
                'string',
                'nullable',
            ],
            'condition'      => [
                'string',
                'nullable',
            ],
        ];
    }
}
