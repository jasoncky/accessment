@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.sentence.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.sentences.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.sentence.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($sentence) ? $sentence->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.sentence.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('style') ? 'has-error' : '' }}">
                <label for="style">{{ trans('cruds.sentence.fields.style') }}*</label>
                <input type="text" id="style" name="style" class="form-control" value="{{ old('style', isset($sentence) ? $sentence->style : '') }}" required>
                @if($errors->has('slug'))
                    <em class="invalid-feedback">
                        {{ $errors->first('style') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.sentence.fields.style_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('colour') ? 'has-error' : '' }}">
                <label for="">{{ trans('cruds.sentence.fields.colour') }}*</label>
                <input type="text" id="colour" name="colour" class="form-control" value="{{ old('colour', isset($sentence) ? $sentence->colour : '') }}" placeholder="#FFFFFF" required>
                @if($errors->has('colour'))
                    <em class="invalid-feedback">
                        {{ $errors->first('colour') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.sentence.fields.colour_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
                <label for="position">{{ trans('cruds.sentence.fields.position') }}*</label>
                <input type="number" id="position" name="position" class="form-control" value="{{ old('position', isset($sentence) ? $sentence->position : '') }}" required>
                @if($errors->has('position'))
                    <em class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.sentence.fields.position_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
@section('scripts')
@parent
    <script>
        $('#colour').colorpicker();
    </script>
@endsection