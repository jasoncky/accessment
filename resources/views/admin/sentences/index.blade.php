@extends('layouts.admin')
@section('content')
@can('sentence_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.sentences.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.sentence.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.sentence.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Sentence">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.sentence.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.sentence.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.sentence.fields.style') }}
                        </th>
                        <th>
                            {{ trans('cruds.sentence.fields.colour') }}
                        </th>
                        <th>
                            {{ trans('cruds.sentence.fields.position') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sentences as $key => $sentence)
                        <tr data-entry-id="{{ $sentence->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $sentence->id ?? '' }}
                            </td>
                            <td>
                                {{ $sentence->name ?? '' }}
                            </td>
                            <td>
                                {{ $sentence->style ?? '' }}
                            </td>
                            <td>
                                {{ $sentence->colour ?? '' }}
                            </td>
                            <td>
                                {{ $sentence->position ?? '' }}
                            </td>
                            <td>
                                @can('sentence_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sentences.show', $sentence->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sentence_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sentences.edit', $sentence->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sentence_delete')
                                    <form action="{{ route('admin.sentences.destroy', $sentence->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('sentence_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sentences.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Sentence:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection