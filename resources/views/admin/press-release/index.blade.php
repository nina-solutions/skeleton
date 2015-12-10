@extends('admin/partials/template')

@section('title')

<title>@lang('admin.press-release.head')</title>@stop

@section('breadcrumbs')

<ol class="breadcrumb">
  <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i>@lang('admin.dashboard.head')</a></li>
  <li class="active">@lang('admin.press-release.head')</li>
</ol>@stop

@section('inner-title')

<h1>@lang('admin.press-release.head')<small>@lang('admin.press-release.head')</small></h1>@stop

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">@lang('admin.press-release.index.head')</h3>
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
            <th>Data inizio</th>
            <th>Data fine</th>
            <th>Stato</th>
            <th></th>
          </tr>
<?php $iterator = 0; ?>
@foreach($communications as $idx => $c)
          <tr>
            <td>{{$c->title}}</td>
            <td>{{$c->com_inizio}}</td>
            <td>{{$c->com_fine}}</td>
            <td>
@if($c->com_stato=='SI')<span class="label label-success">{{$c->com_stato}}</span>
@else<span class="label label-warning">{{$c->com_stato}}</span>
@endif

            </td>
            <td>
{!! "<a href='/admin/press-release/$c->id/edit'>" !!}
<span class="glyphicon glyphicon-edit"></span>
{!! "</a>" !!}

{!! "<a href='/admin/press-release/$c->id'>" !!}
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
{!! $communications->render() !!}

  </div>
</div>@stop

