@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tool.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tools.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tool.fields.id') }}
                        </th>
                        <td>
                            {{ $tool->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tool.fields.code') }}
                        </th>
                        <td>
                            {{ $tool->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tool.fields.description') }}
                        </th>
                        <td>
                            {{ $tool->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tool.fields.quantity') }}
                        </th>
                        <td>
                            {{ $tool->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tool.fields.user_asignado') }}
                        </th>
                        <td>
                            @foreach($tool->user_asignados as $key => $user_asignado)
                                <span class="label label-info">{{ $user_asignado->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tools.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection