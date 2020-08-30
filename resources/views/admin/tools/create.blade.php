@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.tool.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tools.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.tool.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tool.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.tool.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tool.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.tool.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tool.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_asignados">{{ trans('cruds.tool.fields.user_asignado') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('user_asignados') ? 'is-invalid' : '' }}" name="user_asignados[]" id="user_asignados" multiple>
                    @foreach($user_asignados as $id => $user_asignado)
                        <option value="{{ $id }}" {{ in_array($id, old('user_asignados', [])) ? 'selected' : '' }}>{{ $user_asignado }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_asignados'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_asignados') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tool.fields.user_asignado_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection