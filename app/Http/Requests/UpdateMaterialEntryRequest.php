<?php

namespace App\Http\Requests;

use App\Models\MaterialEntry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMaterialEntryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('material_entry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'observations' => [
                'string',
                'nullable',
            ],
            'entry_cost'   => [
                'numeric',
            ],
            'unity'        => [
                'string',
                'nullable',
            ],
            'quantity'     => [
                'numeric',
            ],
        ];
    }
}
