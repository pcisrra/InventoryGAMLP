@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.outputMaterial.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.output-materials.update", [$outputMaterial->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="observations">{{ trans('cruds.outputMaterial.fields.observations') }}</label>
                <input class="form-control {{ $errors->has('observations') ? 'is-invalid' : '' }}" type="text" name="observations" id="observations" value="{{ old('observations', $outputMaterial->observations) }}">
                @if($errors->has('observations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('observations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outputMaterial.fields.observations_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ots">{{ trans('cruds.outputMaterial.fields.ots') }}</label>
                <input class="form-control {{ $errors->has('ots') ? 'is-invalid' : '' }}" type="text" name="ots" id="ots" value="{{ old('ots', $outputMaterial->ots) }}">
                @if($errors->has('ots'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ots') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outputMaterial.fields.ots_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="output_unity">{{ trans('cruds.outputMaterial.fields.output_unity') }}</label>
                <input class="form-control {{ $errors->has('output_unity') ? 'is-invalid' : '' }}" type="text" name="output_unity" id="output_unity" value="{{ old('output_unity', $outputMaterial->output_unity) }}">
                @if($errors->has('output_unity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('output_unity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outputMaterial.fields.output_unity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="output_quantity">{{ trans('cruds.outputMaterial.fields.output_quantity') }}</label>
                <input class="form-control {{ $errors->has('output_quantity') ? 'is-invalid' : '' }}" type="number" name="output_quantity" id="output_quantity" value="{{ old('output_quantity', $outputMaterial->output_quantity) }}" step="0.1">
                @if($errors->has('output_quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('output_quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.outputMaterial.fields.output_quantity_helper') }}</span>
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