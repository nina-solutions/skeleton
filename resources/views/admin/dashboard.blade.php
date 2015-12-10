@extends('admin/partials/template')

@section('title')

<title>@lang('admin.dashboard.head')</title>@stop

@section('breadcrumbs')

<ol class="breadcrumb">
  <li class="active"><a href="#"><i class="fa fa-dashboard"></i>@lang('admin.dashboard.head')</a></li>
</ol>@stop

@section('inner-title')

<h1>@lang('admin.dashboard.head')<small>@lang('admin.dashboard.head')</small></h1>@stop

@section('content')

<p>@lang('admin.dashboard.head')</p>
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
{!! Form::open(['method' => 'POST','data-toggle' => 'validator', 'role' => 'form', 'class' => '']) !!}

      <div class="box-body">
        <div class="form-group">
{!! Form::label('acl[]', trans('admin.dashboard.contexts'), ['class' => '']) !!}

{!! Form::select('acl[]', $options, $selected, ['required', 'multiple' => true, 'class' => 'form-control select2']) !!}

        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">@lang('admin.actions.save')</button>
      </div>
{!! Form::close() !!}

    </div>
  </div>
</div>@stop

