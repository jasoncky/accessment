@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sentence.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sentence.fields.id') }}
                        </th>
                        <td>
                            {{ $sentence->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sentence.fields.name') }}
                        </th>
                        <td>
                            {{ $sentence->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sentence.fields.style') }}
                        </th>
                        <td>
                            {{ $sentence->style }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sentence.fields.colour') }}
                        </th>
                        <td>
                            {!! $sentence->colour !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sentence.fields.position') }}
                        </th>
                        <td>
                            {!! $sentence->position !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection