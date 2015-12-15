@extends('admin/partials/template')

@section('title')

<title>@lang('admin.events.head')</title>@stop

@section('breadcrumbs')

<ol class="breadcrumb">
  <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i>@lang('admin.dashboard.head')</a></li>
  <li class="active">@lang('admin.events.head')</li>
</ol>@stop

@section('inner-title')

<h1>@lang('admin.events.head')<small>@lang('admin.events.head')</small></h1>@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">@lang('admin.events.index.head')</h3>
        <div class="box-tools">
          <div style="width:150 px;" class="input-group">
            <form action="" id="search-form">
{!! Form::hidden('h-search-text', Input::old('h-search-text'), array('id'=>'h-search-text')) !!}

            </form>
{!! Form::text('search-text', Input::old('search-text'), array('id'=>'search-text', 'class'=>'form-control input-sm pull-right', 'placeholder'=>trans('admin.search.text'))) !!}

            <div class="input-group-btn">
              <button id="press-search" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>Titolo</th>
            <th>Codice</th>
            <th></th>
          </tr>
<?php $iterator = 0; ?>
@foreach($events as $idx => $e)
          <tr>
            <td>{{$e->description}}</td>
            <td>{{$e->eve_codmanif}}</td>
            <td>
{!! "<a href='/admin/press-release/$e->id/edit'>" !!}
<span class="glyphicon glyphicon-edit"></span>
{!! "</a>" !!}

{!! "<a href='/admin/press-release/$e->id'>" !!}
<span class="glyphicon glyphicon-remove"></span>
{!! "</a>" !!}

            </td>
          </tr>
<?php $iterator ++; ?>
@endforeach
<?php unset($iterator); ?>


        </table>
      </div>
    </div>
{!! $events->render() !!}

  </div>
</div>@stop

