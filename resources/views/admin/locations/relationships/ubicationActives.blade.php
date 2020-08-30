@can('active_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.actives.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.active.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.active.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ubicationActives">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.active.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.active.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.active.fields.classification') }}
                        </th>
                        <th>
                            {{ trans('cruds.active.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.active.fields.cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.active.fields.ubication') }}
                        </th>
                        <th>
                            {{ trans('cruds.active.fields.observations') }}
                        </th>
                        <th>
                            {{ trans('cruds.active.fields.condition') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($actives as $key => $active)
                        <tr data-entry-id="{{ $active->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $active->id ?? '' }}
                            </td>
                            <td>
                                {{ $active->code ?? '' }}
                            </td>
                            <td>
                                {{ $active->classification ?? '' }}
                            </td>
                            <td>
                                {{ $active->description ?? '' }}
                            </td>
                            <td>
                                {{ $active->cost ?? '' }}
                            </td>
                            <td>
                                @foreach($active->ubications as $key => $item)
                                    <span class="badge badge-info">{{ $item->code }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $active->observations ?? '' }}
                            </td>
                            <td>
                                {{ $active->condition ?? '' }}
                            </td>
                            <td>
                                @can('active_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.actives.show', $active->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('active_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.actives.edit', $active->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('active_delete')
                                    <form action="{{ route('admin.actives.destroy', $active->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('active_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.actives.massDestroy') }}",
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
  let table = $('.datatable-ubicationActives:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection