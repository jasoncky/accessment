@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sentence.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.sentences.update", [$sentence->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.sentence.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($sentence) ? $sentence->name : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.sentence.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('style') ? 'has-error' : '' }}">
                <label for="style">{{ trans('cruds.sentence.fields.style') }}*</label>
                <input type="text" id="style" name="style" class="form-control" value="{{ old('style', isset($sentence) ? $sentence->style : '') }}" required>
                @if($errors->has('style'))
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
                <input type="text" id="position" name="position" class="form-control" value="{{ old('style', isset($sentence) ? $sentence->position : '') }}" required>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('#colour').colorpicker();
    </script>
@endsection