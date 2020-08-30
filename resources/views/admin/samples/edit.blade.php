@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sample.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.samples.update", [$sample->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.sample.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $sample->code) }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sample.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="detail">{{ trans('cruds.sample.fields.detail') }}</label>
                <input class="form-control {{ $errors->has('detail') ? 'is-invalid' : '' }}" type="text" name="detail" id="detail" value="{{ old('detail', $sample->detail) }}" required>
                @if($errors->has('detail'))
                    <div class="invalid-feedback">
                        {{ $errors->first('detail') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sample.fields.detail_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material">{{ trans('cruds.sample.fields.material') }}</label>
                <input class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" type="text" name="material" id="material" value="{{ old('material', $sample->material) }}">
                @if($errors->has('material'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sample.fields.material_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="condition">{{ trans('cruds.sample.fields.condition') }}</label>
                <input class="form-control {{ $errors->has('condition') ? 'is-invalid' : '' }}" type="text" name="condition" id="condition" value="{{ old('condition', $sample->condition) }}">
                @if($errors->has('condition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('condition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sample.fields.condition_helper') }}</span>
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