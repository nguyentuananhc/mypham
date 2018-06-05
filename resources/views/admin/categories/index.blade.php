@extends('voyager::master')
@section('page_title', __('voyager::generic.viewing').' '.__('string.categories'))
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="icon voyager-pie-chart"></i> {{ __('string.categories') }}
        </h1>
        <a href="{{ route('admin.categories.create', ['langCode' => 'vi', 'id' => null]) }}"
           class="btn btn-success btn-add-new">
            <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
        </a>
        <a class="btn btn-danger" id="bulk_delete_btn">
            <i class="voyager-trash"></i>
            <span>Bulk Delete</span>
        </a>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin/custom.css">
@stop

@section('content')
    @include('admin.components.bulk-delete', ['route' => 'admin.categories.index'])
    <div id="voyager-notifications"></div>
    <div class="page-content browse container-fluid">
        <div class="alerts">
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="select_all">
                                    </th>
                                    <th>
                                        {{__('string.name')}}
                                    </th>
                                    <th>
                                        {{ trans('string.created_at') }}
                                    </th>
                                    <th>
                                        {{ trans('string.available_lang') }}
                                    </th>
                                    <th class="actions">{{ trans('string.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="row_id" id="checkbox_{{ $category->id }}"
                                                   value="{{ $category->id }}">
                                        </td>
                                        <td>
                                            @php
                                                $name = '';
                                                $translation = $category->translations->where('lang_code', config('app.fallback_locale'))->first();
                                                if($translation) {
                                                    $name = $translation->name;
                                                }elseif(count($category->translations)) {
                                                    $name = $category->translations[0]->name;
                                                }
                                            @endphp
                                            {{ $name }}
                                        </td>
                                        <td>
                                            <p>{{ $category->created_at }}</p>
                                        </td>
                                        <td>
                                            @foreach($category->translations as $translation)
                                                <a href="{{ route('admin.categories.edit', ['langCode' => $translation->lang_code, 'id' => $category->id]) }}"
                                                   class="btn btn-sm btn-primary edit">
                                                    <span class="hidden-xs hidden-sm">{{ $translation->lang->name }}</span>
                                                </a>
                                            @endforeach
                                            @if(count($category->translations) < count($languages))
                                                @php
                                                    $categoryLangs = $category->translations->pluck('lang_code')->toArray();
                                                    $diff = array_diff($languages->pluck('code')->toArray(), $categoryLangs);
                                                @endphp
                                                <a href="{{ route('admin.categories.create', ['langCode' => head($diff), 'id' => $category->id]) }}"
                                                   title="Add"
                                                   class="btn btn-sm btn-success">
                                                    <i class="voyager-plus"></i>
                                                    <span class="hidden-xs hidden-sm">{{ trans('string.add') }}</span>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="no-sort no-click" id="bread-actions">
                                            <a href="javascript:;" title="Delete"
                                               class="btn btn-sm btn-danger pull-right delete"
                                               data-id="{{ $category->id }}"
                                               id="delete-{{ $category->id }}">
                                                <i class="voyager-trash"></i>
                                                <span class="hidden-xs hidden-sm">Delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="voyager-trash"></i> {{ trans('message.confirm_delete') }}</h4>
                </div>
                <div class="modal-footer">
                    <form action="" id="delete_form" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ trans('string.delete') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right"
                            data-dismiss="modal">{{ trans('string.cancel') }}</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@stop

@section('css')
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@stop

@section('javascript')
    <!-- DataTables -->
    <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    <script>
      $(document).ready(function () {
        var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge([
                        "order" => [],
                        "language" => __('voyager::datatable'),
                        "columnDefs" => [['searchable' =>  false, 'targets' => -1 ]],
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!})

        $('.select_all').on('click', function (e) {
          $('input[name="row_id"]').prop('checked', $(this).prop('checked'))
        })
      })


      var deleteFormAction
      $('td').on('click', '.delete', function (e) {
        $('#delete_form')[0].action = '{{ route('admin.categories.destroy', ['id' => '__id']) }}'.replace('__id', $(this).data('id'))
        $('#delete_modal').modal('show')
      })
    </script>
@stop
