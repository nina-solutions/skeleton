@extends('admin/partials/template')

@section('title')

<title>@lang('admin.contexts.head')</title>@stop

@section('breadcrumbs')

<ol class="breadcrumb">
  <li><a href="/admin/dashboard"><i class="fa fa-dashboard"></i>@lang('admin.dashboard.head')</a></li>
  <li class="active">@lang('admin.contexts.head')</li>
</ol>@stop

@section('inner-title')

<h1>@lang('admin.contexts.head')<small>@lang('admin.contexts.head')</small></h1>@stop

@section('content')

<div class="row">
{!! Form::model($context, ['route' => (isset($id) ? ['admin.contexts.update', $id] : ['admin.contexts.store']), 'method' => (isset($id) ? 'PUT' : 'POST'),'data-toggle' => 'validator', 'role' => 'form', 'class' => '']) !!}

  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
@if(isset($id))
{!! Form::hidden('id', $id) !!}

@endif

        <div class="box-body">
          <div class="form-group">
{!! Form::label('code', trans('admin.contexts.form.code'), ['class' => '']) !!}

{!! Form::text('code', Input::old('code'), ['required', 'class'=>'form-control', 'placeholder'=>trans('admin.contexts.form.code')]) !!}

          </div>
          <div class="form-group">
{!! Form::label('name', trans('admin.contexts.form.name'), ['class' => '']) !!}

{!! Form::text('name', Input::old('name'), ['required', 'class'=>'form-control', 'placeholder'=>trans('admin.contexts.form.name')]) !!}

          </div>
          <div class="form-group">
{!! Form::label('context_id', trans('admin.contexts.form.parent'), ['class' => '']) !!}

{!! Form::select('context_id', $contexts, Input::old('context_id'), ['class'=>'form-control select2', 'placeholder'=>trans('admin.contexts.form.parent')]) !!}

          </div>
          <div class="form-group">
{!! Form::label('datepicker', trans('admin.contexts.form.dates'), ['class' => '']) !!}

            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
{!! Form::text('datepicker', Input::old('datepicker'), ['class'=>'form-control pull-right', 'placeholder' => trans('admin.contexts.form.dates')]) !!}

            </div>
{!! Form::hidden('start', Input::old('start'), ['id' => 'start']) !!}

{!! Form::hidden('end', Input::old('end'), ['id' => 'end']) !!}

          </div>
          <div class="form-group">
{!! Form::label('categories[]', trans('admin.contexts.form.categories'), ['class' => '']) !!}

{!! Form::select('categories[]', $categories, $context->categories()->get()->pluck('id')->toArray(), ['required', 'multiple' => true, 'class' => 'form-control select2']) !!}

          </div>
          <div class="form-group">
{!! Form::label('language_id', trans('admin.'.$table->name.'.form.language_id'), ['class' => '']) !!}

{!! Form::select("language_id", $languages, Input::old("language_id"), ["id" => "language_id", "class"=>"form-control select2", "placeholder"=>trans("admin.$table->name.form.language_id")]) !!}

          </div>
        </div>
        <!-- /.box-body-->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">@lang('admin.actions.save')</button>
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
{!! Form::close() !!}

</div>@stop

