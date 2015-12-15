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

{!! Form::model($model, ['action' => (isset($id) ? ['HubController@update', $table->contentable_type, $id] : ['HubController@store', $table->contentable_type]), 'method' => (isset($id) ? 'PUT' : 'POST'),'data-toggle' => 'validator', 'role' => 'form', 'class' => '']) !!}

<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{$title}} - {{$status->name}}</h3>
      </div>
@if(isset($id))
{!! Form::hidden('id', $id) !!}

@endif

      <div class="box-body">
        <div class="form-group">
{!! Form::label('content[name]', trans('admin.contents.form.name')) !!}

{!! Form::text('content[name]', null, ['required', 'class'=>'form-control', 'placeholder'=>trans('admin.contents.form.name')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('content[description]', trans('admin.contents.form.description')) !!}

{!! Form::text('content[description]', null, ['required', 'class'=>'form-control', 'placeholder'=>trans('admin.contents.form.description')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('link]', trans('admin.contents.form.link')) !!}

{!! Form::text('content[link]', null, ['class'=>'form-control', 'placeholder'=>trans('admin.contents.form.link')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('content[context_id]', trans('admin.contexts.form.fair')) !!}

{!! Form::select('content[context_id]', $contexts, null, ['required', 'class'=>'form-control select2', 'placeholder'=>trans('admin.contexts.form.parent')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('content[content_id]', trans('admin.contents.form.parent')) !!}

{!! Form::select('content[content_id]', $contents, null, ['class'=>'form-control select2', 'placeholder'=>trans('admin.contents.form.parent')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('datepicker', trans('admin.contents.form.dates')) !!}

          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
{!! Form::text('datepicker', Input::old('datepicker'), ['class'=>'form-control pull-right', 'placeholder'=>trans('admin.contents.form.dates')]) !!}

          </div>
{!! Form::hidden('content[start]', null, ['id' => 'start']) !!}

{!! Form::hidden('content[end]', null, ['id' => 'end']) !!}

{!! Form::hidden('content[status_id]', null, ['id' => 'status_id']) !!}

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
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-body">
        <div class="form-group">
{!! Form::label('category_id', trans('admin.'.$table->name.'.form.categories')) !!}

{!! Form::select('category_id', $categories, null, ['required', 'class'=>'form-control select2', 'placeholder'=>trans('admin.'.$table->name.'.form.categories')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('notes', trans('admin.'.$table->name.'.form.notes')) !!}

{!! Form::text('notes', null, ['class'=>'form-control select2', 'placeholder'=>trans('admin.'.$table->name.'.form.notes')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('language_id', trans('admin.'.$table->name.'.form.language_id'), ['class' => '']) !!}

{!! Form::select("language_id", $languages, Input::old("language_id"), ["id" => "language_id", "class"=>"form-control select2", "placeholder"=>trans("admin.$table->name.form.language_id")]) !!}

        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div id="translations" class="row">
{!! Form::hidden('fields', implode(';', $translatables), ['id' => 'fields']) !!}

<?php $i = 0; ?>
@foreach($translations as $trans_id => $translation)
      <div class="col-md-12 translation-box">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $languages[$translation->language_id] }}</h3>
            <div class="box-tools pull-right"><a data-value="{{ $translation->language_id }}" class="btn btn-box-tool btn-sm remove-translation"><span class="glyphicon glyphicon-trash"></span></a></div>
          </div>
          <div class="box-body">
<?php $iterator = 0; ?>
@foreach($translatables as $idx => $value)
            <div class="row">
              <div class="col-md-4">
{!! Form::label($translation->language_id.'['.$value.']', $value, ['class' => 'pull-right']) !!}

              </div>
              <div class="col-md-8">
{!! Form::text($translation->language_id."[".$value."]", $translation->$value, ["required", "class"=>"form-control select2", "placeholder"=>trans("admin.$table->name.form.language")]) !!}

              </div>
            </div>
<?php $iterator ++; ?>
@endforeach
<?php unset($iterator); ?>


          </div>
        </div>
      </div>
<?php $i ++; ?>
@endforeach
<?php unset($i); ?>


    </div>
  </div>
</div>
{!! Form::close() !!}
@stop

