@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.material.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.materials.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.material.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.material.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.material.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.material.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unity">{{ trans('cruds.material.fields.unity') }}</label>
                <input class="form-control {{ $errors->has('unity') ? 'is-invalid' : '' }}" type="text" name="unity" id="unity" value="{{ old('unity', '') }}">
                @if($errors->has('unity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.material.fields.unity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.material.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.material.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unitary_cost">{{ trans('cruds.material.fields.unitary_cost') }}</label>
                <input class="form-control {{ $errors->has('unitary_cost') ? 'is-invalid' : '' }}" type="number" name="unitary_cost" id="unitary_cost" value="{{ old('unitary_cost', '') }}" step="0.01">
                @if($errors->has('unitary_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unitary_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.material.fields.unitary_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_cost">{{ trans('cruds.material.fields.total_cost') }}</label>
                <input class="form-control {{ $errors->has('total_cost') ? 'is-invalid' : '' }}" type="number" name="total_cost" id="total_cost" value="{{ old('total_cost', '') }}" step="0.01">
                @if($errors->has('total_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.material.fields.total_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="localization_id">{{ trans('cruds.material.fields.localization') }}</label>
                <select class="form-control select2 {{ $errors->has('localization') ? 'is-invalid' : '' }}" name="localization_id" id="localization_id" required>
                    @foreach($localizations as $id => $localization)
                        <option value="{{ $id }}" {{ old('localization_id') == $id ? 'selected' : '' }}>{{ $localization }}</option>
                    @endforeach
                </select>
                @if($errors->has('localization'))
                    <div class="invalid-feedback">
                        {{ $errors->first('localization') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.material.fields.localization_helper') }}</span>
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