@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('contact::contactrequests.title.contactrequest') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.contact.contactrequest.index') }}">{{ trans('contact::contactrequests.title.contactrequests') }}</a></li>
        <li class="current">{{ trans('contact::contactrequests.title.contactrequest') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('contact::contactrequests.request information') }}</h3>
                </div>
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt>{{ trans('contact::contact.full-name') }}</dt>
                        <dd>{{ $request->name }}</dd>
                        <dt>{{ trans('contact::contact.email') }}</dt>
                        <dd><a href="mailto:{{ $request->email }}">{{ $request->email }}</a></dd>
                        <dt>{{ trans('contact::contact.company') }}</dt>
                        <dd>{{ $request->company }}</dd>
                        <dt>{{ trans('contact::contact.phone') }}</dt>
                        <dd>{{ $request->phone }}</dd>
                        <dt>{{ trans('contact::contact.message') }}</dt>
                        <dd>{!! nl2br($request->message) !!}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop
