@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.outputMaterial.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.output-materials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.outputMaterial.fields.observations') }}
                        </th>
                        <td>
                            {{ $outputMaterial->observations }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outputMaterial.fields.date_sol') }}
                        </th>
                        <td>
                            {{ $outputMaterial->date_sol }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outputMaterial.fields.ots') }}
                        </th>
                        <td>
                            {{ $outputMaterial->ots }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outputMaterial.fields.output_unity') }}
                        </th>
                        <td>
                            {{ $outputMaterial->output_unity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outputMaterial.fields.output_quantity') }}
                        </th>
                        <td>
                            {{ $outputMaterial->output_quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outputMaterial.fields.material') }}
                        </th>
                        <td>
                            {{ $outputMaterial->material->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outputMaterial.fields.user') }}
                        </th>
                        <td>
                            {{ $outputMaterial->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.output-materials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection