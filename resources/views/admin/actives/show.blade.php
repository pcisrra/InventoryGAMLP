@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.active.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actives.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.active.fields.id') }}
                        </th>
                        <td>
                            {{ $active->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.active.fields.code') }}
                        </th>
                        <td>
                            {{ $active->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.active.fields.classification') }}
                        </th>
                        <td>
                            {{ $active->classification }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.active.fields.description') }}
                        </th>
                        <td>
                            {{ $active->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.active.fields.cost') }}
                        </th>
                        <td>
                            {{ $active->cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.active.fields.ubication') }}
                        </th>
                        <td>
                            @foreach($active->ubications as $key => $ubication)
                                <span class="label label-info">{{ $ubication->code }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.active.fields.observations') }}
                        </th>
                        <td>
                            {{ $active->observations }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.active.fields.condition') }}
                        </th>
                        <td>
                            {{ $active->condition }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.actives.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection