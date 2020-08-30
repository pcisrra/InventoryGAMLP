@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.outputMaterial.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.output-materials.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="observations">{{ trans('cruds.outputMaterial.fields.observations') }}</label>
                <input class="form-control {{ $errors->has('observations') ? 'is-invalid' : '' }}" type="text" name="observations" id="observations" value="{{ old('observations', '') }}">
                @if($errors->has('observations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outputMaterial.fields.observations_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_sol">{{ trans('cruds.outputMaterial.fields.date_sol') }}</label>
                <input class="form-control datetime {{ $errors->has('date_sol') ? 'is-invalid' : '' }}" type="text" name="date_sol" id="date_sol" value="{{ old('date_sol') }}">
                @if($errors->has('date_sol'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_sol') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outputMaterial.fields.date_sol_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ots">{{ trans('cruds.outputMaterial.fields.ots') }}</label>
                <input class="form-control {{ $errors->has('ots') ? 'is-invalid' : '' }}" type="text" name="ots" id="ots" value="{{ old('ots', '') }}">
                @if($errors->has('ots'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ots') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outputMaterial.fields.ots_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="output_unity">{{ trans('cruds.outputMaterial.fields.output_unity') }}</label>
                <input class="form-control {{ $errors->has('output_unity') ? 'is-invalid' : '' }}" type="text" name="output_unity" id="output_unity" value="{{ old('output_unity', '') }}">
                @if($errors->has('output_unity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('output_unity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outputMaterial.fields.output_unity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="output_quantity">{{ trans('cruds.outputMaterial.fields.output_quantity') }}</label>
                <input class="form-control {{ $errors->has('output_quantity') ? 'is-invalid' : '' }}" type="number" name="output_quantity" id="output_quantity" value="{{ old('output_quantity', '') }}" step="0.1">
                @if($errors->has('output_quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('output_quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outputMaterial.fields.output_quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_id">{{ trans('cruds.outputMaterial.fields.material') }}</label>
                <select class="form-control select2 {{ $errors->has('material') ? 'is-invalid' : '' }}" name="material_id" id="material_id">
                    @foreach($materials as $id => $material)
                        <option value="{{ $id }}" {{ old('material_id') == $id ? 'selected' : '' }}>{{ $material }}</option>
                    @endforeach
                </select>
                @if($errors->has('material'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outputMaterial.fields.material_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.outputMaterial.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outputMaterial.fields.user_helper') }}</span>
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