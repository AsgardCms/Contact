@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('contact::contactrequests.title.contactrequests') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('contact::contactrequests.title.contactrequests') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($requests)): ?>
                            <?php foreach ($requests as $request): ?>
                            <tr>
                                <td>
                                    <a href="{{ route('admin.contact.contactrequest.show', [$request->id]) }}">
                                        {{ $request->created_at }}
                                    </a>
                                </td>
                                <td>
                                    {{ $request->name }}
                                </td>
                                <td>
                                    {{ $request->email }}
                                </td>
                                <td>
                                    {{ $request->company }}
                                </td>
                                <td>
                                    {{ $request->phone }}
                                </td>
                                <td>
                                    {{ str_limit(strip_tags($request->message)) }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.contact.contactrequest.show', [$request->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.contact.contactrequest.destroy', [$request->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('scripts')
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@stop
