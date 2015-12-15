@extends('admin/partials/template')

@section('title')

<title>@lang('admin.languages.head')</title>@stop

@section('breadcrumbs')

<ol class="breadcrumb">
  <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i>@lang('admin.dashboard.head')</a></li>
  <li class="active">@lang('admin.languages.head')</li>
</ol>@stop

@section('inner-title')

<h1>@lang('admin.languages.head')<small>@lang('admin.languages.head')</small></h1>@stop

@section('content')

<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">@lang('admin.languages.head')</h3>
      </div>
{!! Form::model($language, ['route' => (isset($id) ? array('admin.languages.update', $id) : array('admin.languages.store')), 'method' => (isset($id) ? 'PUT' : 'POST'),'data-toggle' => 'validator', 'role' => 'form', 'class' => '']) !!}

@if(isset($id))
{!! Form::hidden('id', $id) !!}

@endif

      <div class="box-body">
        <div class="form-group">
{!! Form::label('code', trans('admin.languages.form.code'), ['class' => '']) !!}

{!! Form::text('code', Input::old('code'), array('required', 'class'=>'form-control', 'placeholder'=>trans('admin.languages.form.code'))) !!}

        </div>
        <div class="form-group">
{!! Form::label('description', trans('admin.languages.form.description'), ['class' => '']) !!}

{!! Form::text('description', Input::old('description'), array('required', 'class'=>'form-control', 'placeholder'=>trans('admin.languages.form.description'))) !!}

        </div>
      </div>
      <!-- /.box-body-->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">@lang('admin.actions.save')</button>
      </div>
{!! Form::close() !!}

    </div>
  </div>
</div>@stop

