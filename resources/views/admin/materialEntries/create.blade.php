@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.materialEntry.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.material-entries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="observations">{{ trans('cruds.materialEntry.fields.observations') }}</label>
                <input class="form-control {{ $errors->has('observations') ? 'is-invalid' : '' }}" type="text" name="observations" id="observations" value="{{ old('observations', '') }}">
                @if($errors->has('observations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.materialEntry.fields.observations_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="entry_date">{{ trans('cruds.materialEntry.fields.entry_date') }}</label>
                <input class="form-control datetime {{ $errors->has('entry_date') ? 'is-invalid' : '' }}" type="text" name="entry_date" id="entry_date" value="{{ old('entry_date') }}">
                @if($errors->has('entry_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('entry_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.materialEntry.fields.entry_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="entry_cost">{{ trans('cruds.materialEntry.fields.entry_cost') }}</label>
                <input class="form-control {{ $errors->has('entry_cost') ? 'is-invalid' : '' }}" type="number" name="entry_cost" id="entry_cost" value="{{ old('entry_cost', '') }}" step="0.01">
                @if($errors->has('entry_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('entry_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.materialEntry.fields.entry_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unity">{{ trans('cruds.materialEntry.fields.unity') }}</label>
                <input class="form-control {{ $errors->has('unity') ? 'is-invalid' : '' }}" type="text" name="unity" id="unity" value="{{ old('unity', '') }}">
                @if($errors->has('unity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.materialEntry.fields.unity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.materialEntry.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="0.001">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.materialEntry.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_id">{{ trans('cruds.materialEntry.fields.material') }}</label>
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
                <span class="help-block">{{ trans('cruds.materialEntry.fields.material_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.materialEntry.fields.user') }}</label>
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
                <span class="help-block">{{ trans('cruds.materialEntry.fields.user_helper') }}</span>
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