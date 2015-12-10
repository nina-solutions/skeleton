<!DOCTYPE html>
<html>
  <head>
    <script src="{{ URL::asset("js/jquery/jquery.js") }}" rel="javascript"></script>
    <script src="{{ URL::asset("js/bootstrap/bootstrap.js") }}" rel="javascript"></script>
    <script src="{{ URL::asset("js/bootstrap/bootstrap/validator.js") }}" rel="javascript"></script>
    <link href="{{ elixir("css/app.css") }}" rel="stylesheet">
    <script src="{{ elixir("js/app.js") }}" rel="javascript" defer="defer"></script>
    <title>@lang('auth.password.title')</title>
  </head>
  <body>
    <div class="container">
      <div class="content">
<?php $iterator = 0; ?>
@foreach($errors->all() as $idx => $error)
                <div class="alert alert-warning"><a href="#" data-dismiss="alert" aria-label="close" class="close">&times;</a><strong>{{$error}}</strong></div>
<?php $iterator ++; ?>
@endforeach
<?php unset($iterator); ?>


@if(Session::has('message'))
                        <div class="alert alert-info"><a href="#" data-dismiss="alert" aria-label="close" class="close">&times;</a><strong>{{Session::get('message')}}</strong></div>
@endif

        <h1>@lang('auth.password.title')</h1>
{!! Form::open(array('url' => 'password/email', 'data-toggle' => 'validator', 'class' => 'form-horizontal hub-press', 'files' => true)) !!}

                <fieldset>
                  <legend>@lang('auth.password.head')</legend>
                  <div class="form-group">
{!! Form::label('email', trans('auth.contact.email'), ['class' => 'control-label col-md-3']) !!}

                    <div class="col-md-9">
{!! Form::text('email', Input::old('email'), array('required', 'class'=>'form-control', 'placeholder'=>trans('auth.contact.email'))) !!}

                    </div>
                  </div>
                </fieldset>
                <fieldset>
                  <div class="form-group">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
@if(env('APP_ENV') == 'testing')
{!! Form::submit('submit', array('class' => 'btn btn-primary', 'name' => 'submit')) !!}

@endif

{!! Form::submit(trans('auth.actions.password'), array('class' => 'btn btn-primary', 'name' => 'submit')) !!}

{!! Form::reset(trans('auth.actions.reset'), array('class' => 'btn')) !!}

                    </div>
                  </div>
                </fieldset>
{!! Form::close() !!}

      </div>
    </div>
  </body>
</html>