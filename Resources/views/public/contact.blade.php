@extends('layouts.master')

@section('title')
    Contact Food-Atelier | @parent
@stop
@section('meta')
    <meta name="title" content="Contact @setting('core::site-name')" />
    <meta name="description" content="Contact @setting('core::site-name')" />
@stop

@section('content')
    <div class="content-block --contact">
        <div class="container">
            <div class="row">
                @include('contact::public.partials.sidebar')
                <div class="col-md-7">
                    <h2>{{ trans('contact::contact.title') }}</h2>
                    <div class="content">
                        <p>{{ trans('contact::contact.sub-title') }}</p>
                    </div>
                    {!! Form::open(['route' => 'public.contact.submit', 'method' => 'post']) !!}
                        @include('partials.notifications')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name" class="control-label">{{ trans('contact::contact.full-name') }}<span>*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="email" class="control-label">{{ trans('contact::contact.email') }}<span>*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                                    <label for="company" class="control-label">{{ trans('contact::contact.company') }}</label>
                                    <input type="text" class="form-control" name="company" id="company" value="{{ old('company') }}">
                                    {!! $errors->first('company', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <label for="phone" class="control-label">{{ trans('contact::contact.phone') }}</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                                    {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                                    <label for="message" class="control-label">{{ trans('contact::contact.message') }}</label><br>
                                    <textarea name="message" id="message" class="form-control">{{ old('message') }}</textarea>
                                    {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary" value="{{ trans('contact::contact.send') }}"/>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
