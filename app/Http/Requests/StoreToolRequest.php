<?php

namespace App\Http\Requests;

use App\Models\Tool;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreToolRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tool_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code'             => [
                'string',
                'required',
            ],
            'description'      => [
                'string',
                'required',
            ],
            'quantity'         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'user_asignados.*' => [
                'integer',
            ],
            'user_asignados'   => [
                'array',
            ],
        ];
    }
}
