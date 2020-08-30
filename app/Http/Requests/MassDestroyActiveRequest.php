<?php

namespace App\Http\Requests;

use App\Models\Active;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyActiveRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('active_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:actives,id',
        ];
    }
}
