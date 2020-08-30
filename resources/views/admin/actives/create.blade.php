@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.active.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.actives.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.active.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.active.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="classification">{{ trans('cruds.active.fields.classification') }}</label>
                <input class="form-control {{ $errors->has('classification') ? 'is-invalid' : '' }}" type="text" name="classification" id="classification" value="{{ old('classification', '') }}">
                @if($errors->has('classification'))
                    <div class="invalid-feedback">
                        {{ $errors->first('classification') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.active.fields.classification_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.active.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.active.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cost">{{ trans('cruds.active.fields.cost') }}</label>
                <input class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}" type="text" name="cost" id="cost" value="{{ old('cost', '') }}">
                @if($errors->has('cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.active.fields.cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ubications">{{ trans('cruds.active.fields.ubication') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('ubications') ? 'is-invalid' : '' }}" name="ubications[]" id="ubications" multiple required>
                    @foreach($ubications as $id => $ubication)
                        <option value="{{ $id }}" {{ in_array($id, old('ubications', [])) ? 'selected' : '' }}>{{ $ubication }}</option>
                    @endforeach
                </select>
                @if($errors->has('ubications'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ubications') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.active.fields.ubication_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observations">{{ trans('cruds.active.fields.observations') }}</label>
                <input class="form-control {{ $errors->has('observations') ? 'is-invalid' : '' }}" type="text" name="observations" id="observations" value="{{ old('observations', '') }}">
                @if($errors->has('observations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.active.fields.observations_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="condition">{{ trans('cruds.active.fields.condition') }}</label>
                <input class="form-control {{ $errors->has('condition') ? 'is-invalid' : '' }}" type="text" name="condition" id="condition" value="{{ old('condition', '') }}">
                @if($errors->has('condition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('condition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.active.fields.condition_helper') }}</span>
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