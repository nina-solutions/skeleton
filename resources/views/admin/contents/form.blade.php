@extends('admin/partials/template')

@section('title')

<title>@lang('admin.contents.head')</title>@stop

@section('breadcrumbs')

<ol class="breadcrumb">
  <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i>@lang('admin.dashboard.head')</a></li>
  <li class="active">@lang('admin.contents.head')</li>
</ol>@stop

@section('inner-title')

<h1>@lang('admin.contents.head')<small>@lang('admin.contents.head')</small></h1>@stop

@section('content')

<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{$title}} - {{$status->name}}</h3>
      </div>
{!! Form::model($content, ['route' => (isset($id) ? ['admin.contents.update', $id] : ['admin.contents.store']), 'method' => (isset($id) ? 'PUT' : 'POST'),'data-toggle' => 'validator', 'role' => 'form', 'class' => '']) !!}

@if(isset($id))
{!! Form::hidden('id', $id) !!}

@endif

      <div class="box-body">
        <div class="form-group">
{!! Form::label('name', trans('admin.contents.form.name'), ['class' => '']) !!}

{!! Form::text('name', Input::old('name'), ['required', 'class'=>'form-control', 'placeholder'=>trans('admin.contents.form.name')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('description', trans('admin.contents.form.description'), ['class' => '']) !!}

{!! Form::text('description', Input::old('description'), ['required', 'class'=>'form-control', 'placeholder'=>trans('admin.contents.form.description')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('link', trans('admin.contents.form.link'), ['class' => '']) !!}

{!! Form::text('link', Input::old('link'), ['class'=>'form-control', 'placeholder'=>trans('admin.contents.form.link')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('context_id', trans('admin.contexts.form.fair'), ['class' => '']) !!}

{!! Form::select('context_id', $contexts, Input::old('context_id'), ['required', 'class'=>'form-control select2', 'placeholder'=>trans('admin.contexts.form.parent')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('content_id', trans('admin.contents.form.parent'), ['class' => '']) !!}

{!! Form::select('content_id', $contents, Input::old('content_id'), ['class'=>'form-control select2', 'placeholder'=>trans('admin.contents.form.parent')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('datepicker', trans('admin.contents.form.dates'), ['class' => '']) !!}

          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
{!! Form::text('datepicker', Input::old('datepicker'), ['class'=>'form-control pull-right', 'placeholder'=>trans('admin.contents.form.dates')]) !!}

          </div>
{!! Form::hidden('start', Input::old('start'), ['id' => 'start']) !!}

{!! Form::hidden('end', Input::old('end'), ['id' => 'end']) !!}

{!! Form::hidden('status_id', Input::old('status_id'), ['id' => 'status_id']) !!}

        </div>
      </div>
      <!-- /.box-body-->
      <div class="box-footer">
<?php $iterator = 0; ?>
@foreach($transitions as $id => $s)
        <button type="submit" data-value="{{$id}}" class="status-button btn {{'btn-'.$statuses[$id]}}">{{$s}}</button>
<?php $iterator ++; ?>
@endforeach
<?php unset($iterator); ?>


      </div>
{!! Form::close() !!}

    </div>
  </div>
</div>@stop

