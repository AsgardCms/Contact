@extends('layouts.master')

@section('content-header')
    <h1>
        Showing Contact Request
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.contact.contactrequest.index') }}">Contact Requests</a></li>
        <li class="current">Showing Contact Request</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Request information</h3>
                </div>
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd>{{ $request->name }}</dd>
                        <dt>Email</dt>
                        <dd><a href="mailto:{{ $request->email }}">{{ $request->email }}</a></dd>
                        <dt>Company</dt>
                        <dd>{{ $request->company }}</dd>
                        <dt>Phone</dt>
                        <dd>{{ $request->phone }}</dd>
                        <dt>Message</dt>
                        <dd>{!! nl2br($request->message) !!}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop
