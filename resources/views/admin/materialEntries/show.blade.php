@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.materialEntry.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.material-entries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.materialEntry.fields.observations') }}
                        </th>
                        <td>
                            {{ $materialEntry->observations }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materialEntry.fields.entry_date') }}
                        </th>
                        <td>
                            {{ $materialEntry->entry_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materialEntry.fields.entry_cost') }}
                        </th>
                        <td>
                            {{ $materialEntry->entry_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materialEntry.fields.unity') }}
                        </th>
                        <td>
                            {{ $materialEntry->unity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materialEntry.fields.quantity') }}
                        </th>
                        <td>
                            {{ $materialEntry->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materialEntry.fields.material') }}
                        </th>
                        <td>
                            {{ $materialEntry->material->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.materialEntry.fields.user') }}
                        </th>
                        <td>
                            {{ $materialEntry->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.material-entries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection