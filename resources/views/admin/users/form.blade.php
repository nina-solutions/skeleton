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
{!! Form::model($user, ['route' => (isset($id) ? ['admin.'.$table->name.'.update', $id] : ['admin.'.$table->name.'.store']), 'method' => (isset($id) ? 'PUT' : 'POST'),'data-toggle' => 'validator', 'role' => 'form', 'class' => '', 'id' => $table->name]) !!}

  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }} - {{ trans("admin.users.levels.$user->level") }}</h3>
      </div>
      <div class="box-body">
        <div class="form-group">
{!! Form::label('name', trans('admin.'.$table->name.'.form.name'), ['class' => '']) !!}

{!! Form::text('name', Input::old('name'), ['required', 'class'=>'form-control', 'placeholder'=>trans('admin.'.$table->name.'.form.name')]) !!}

        </div>
        <div class="form-group">
{!! Form::label('email', trans('admin.'.$table->name.'.form.email'), ['class' => '']) !!}

{!! Form::text('email', Input::old('email'), ['required', 'class'=>'form-control', 'placeholder'=>trans('admin.'.$table->name.'.form.email')]) !!}

        </div>
@if(isset($id))
{!! Form::hidden('id', $id) !!}

@else
        <div class="form-group">
{!! Form::label('password', trans('admin.'.$table->name.'.form.password'), ['class' => '']) !!}

{!! Form::text('password', Input::old('password'), ['required', 'class'=>'form-control', 'placeholder'=>trans('admin.'.$table->name.'.form.password')]) !!}

        </div>
@endif

        <div class="form-group">
{!! Form::label('context_id', trans('admin.'.$table->name.'.form.context'), ['class' => '']) !!}

{!! Form::select("context_id", $contexts, Input::old("context_id"), ["id" => "context_id", "class"=>"form-control select2", "placeholder"=>trans("admin.$table->name.form.role")]) !!}

        </div>
      </div>
      <!-- /.box-body-->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">@lang('admin.actions.save')</button>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">@lang('admin.'.$table->name.'.permission')</h3>
      </div>
      <div id="permissions" class="box-body">
{!! Form::select("roles", $roles, null, ["id" => "roles", "class"=> "form-control select2 hidden", "placeholder"=>trans("admin.$table->name.form.role")]) !!}

<?php $i = 0; ?>
@foreach($permissions as $context_id => $role_id)
        <div class="row permission form-group">
          <div class="col-md-5">
{!! Form::label('permission[$context_id][role_id]', $contexts[$context_id], ['class' => '']) !!}

          </div>
          <div class="col-md-5">
{!! Form::select("permission[$context_id][role_id]", $roles, $role_id, ["required", "class"=>"form-control select2", "placeholder"=>trans("admin.$table->name.form.role")]) !!}

          </div>
          <div class="col-md-2"><a data-value="{{ $context_id }}" class="btn btn-sm remove-permission"><span class="glyphicon glyphicon-trash"></span></a></div>
        </div>
<?php $i ++; ?>
@endforeach
<?php unset($i); ?>


      </div>
    </div>
  </div>
{!! Form::close() !!}

</div>@stop

