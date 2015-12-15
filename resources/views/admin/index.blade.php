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
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header"><a href="{{ action($table->controller.'@create', isset($table->contentable_type) ? ['contentable_type' => $table->contentable_type] : []) }}" class="btn btn-primary">
          <h3 class="box-title">@lang('admin.actions.create')</h3></a>@include('admin.partials.index.search')


      </div>@include('admin.partials.index.table')


    </div>
{!! $data->render() !!}

  </div>
</div>@stop

