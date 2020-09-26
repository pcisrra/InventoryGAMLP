@extends('layouts.admin')
@section('content')
@can('location_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.locations.create') }}">
                AGREGAR
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header"></div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Location">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.location.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.ref_picture') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locations as $key => $location)
                        <tr data-entry-id="{{ $location->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $location->id ?? '' }}
                            </td>
                            <td>
                                {{ $location->code ?? '' }}
                            </td>
                            <td>
                                {{ $location->description ?? '' }}
                            </td>
                            <td>
                                @foreach($location->ref_picture as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('location_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.locations.show', $location->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('location_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.locations.edit', $location->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('location_delete')
                                    <form action="{{ route('admin.locations.destroy', $location->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('location_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.locations.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Location:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection