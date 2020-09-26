@extends('layouts.admin')
@section('content')
@can('material_entry_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.material-entries.create') }}">
                INGRESAR MATERIAL
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header"></div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-MaterialEntry">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.materialEntry.fields.observations') }}
                        </th>
                        <th>
                            {{ trans('cruds.materialEntry.fields.entry_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.materialEntry.fields.entry_cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.materialEntry.fields.unity') }}
                        </th>
                        <th>
                            {{ trans('cruds.materialEntry.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.materialEntry.fields.material') }}
                        </th>
                        <th>
                            {{ trans('cruds.materialEntry.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materialEntries as $key => $materialEntry)
                        <tr data-entry-id="{{ $materialEntry->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $materialEntry->observations ?? '' }}
                            </td>
                            <td>
                                {{ $materialEntry->entry_date ?? '' }}
                            </td>
                            <td>
                                {{ $materialEntry->entry_cost ?? '' }}
                            </td>
                            <td>
                                {{ $materialEntry->unity ?? '' }}
                            </td>
                            <td>
                                {{ $materialEntry->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $materialEntry->material->code ?? '' }}
                            </td>
                            <td>
                                {{ $materialEntry->user->name ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.materials.enterMat',['codigo_material' => $materialEntry->material->code, 'cantidad' => $materialEntry->quantity]) }}">
                                    REGISTRAR INGRESO
                                </a>
                                <br/>
                                @can('material_entries_delete')
                                    <form action="{{ route('admin.material_entries.destroy', $materialEntry->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="ELIMINAR">
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
@can('material_entry_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.material-entries.massDestroy') }}",
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
  let table = $('.datatable-MaterialEntry:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection