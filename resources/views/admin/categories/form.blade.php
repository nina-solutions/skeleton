@extends('admin/partials/template')

@section('title')

<title>@lang('admin.'.$table->name.'.head')</title>@stop

@section('breadcrumbs')

<ol class="breadcrumb">
  <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i>@lang('admin.dashboard.head')</a></li>
  <li class="active">@lang('admin.'.$table->name.'.head')</li>
</ol>@stop

@section('inner-title')

<h1>@lang('admin.'.$table->name.'.head')<small>@lang('admin.'.$table->name.'.head')</small></h1>@stop

@section('content')

<div class="row">
{!! Form::model($category, ['route' => (isset($id) ? ['admin.'.$table->name.'.update', $id] : ['admin.'.$table->name.'.store']), 'method' => (isset($id) ? 'PUT' : 'POST'),'data-toggle' => 'validator', 'role' => 'form', 'class' => '', 'id' => $table->name]) !!}

  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
{!! Form::label('name', trans('admin.'.$table->name.'.form.name'), ['class' => '']) !!}

{!! Form::text('name', Input::old('name'), ['required', 'class'=>'form-control', 'placeholder'=>trans('admin.'.$table->name.'.form.name')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('description', trans('admin.'.$table->name.'.form.email'), ['class' => '']) !!}

{!! Form::text('description', Input::old('description'), ['class'=>'form-control', 'placeholder'=>trans('admin.'.$table->name.'.form.description')]) !!}

        </div>
      </div>
      <!-- /.box-body-->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">@lang('admin.actions.save')</button>
      </div>
    </div>
  </div>
{!! Form::close() !!}

</div>@stop

