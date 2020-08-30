<?php

namespace App\Http\Requests;

use App\Models\Sample;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSampleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sample_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code'      => [
                'string',
                'required',
            ],
            'detail'    => [
                'string',
                'required',
            ],
            'material'  => [
                'string',
                'nullable',
            ],
            'condition' => [
                'string',
                'nullable',
            ],
        ];
    }
}
