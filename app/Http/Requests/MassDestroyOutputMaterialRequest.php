<?php

namespace App\Http\Requests;

use App\Models\OutputMaterial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOutputMaterialRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('output_material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:output_materials,id',
        ];
    }
}
