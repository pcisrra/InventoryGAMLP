<?php

namespace App\Http\Requests;

use App\Models\MaterialEntry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMaterialEntryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('material_entry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'observations' => [
                'string',
                'nullable',
            ],
            'entry_date'   => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
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
