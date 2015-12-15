<!DOCTYPE html>
<html>
  <head>
    <script src="{{ URL::asset("js/jquery/jquery.js") }}" rel="javascript"></script>
    <script src="{{ URL::asset("js/bootstrap/bootstrap.js") }}" rel="javascript"></script>
    <script src="{{ URL::asset("js/bootstrap/bootstrap/validator.js") }}" rel="javascript"></script>
    <link href="{{ elixir("css/app.css") }}" rel="stylesheet">
    <script src="{{ elixir("js/app.js") }}" rel="javascript" defer="defer"></script>
    <title>@lang('visa.thankyou.title')</title>
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

        <h1>@lang('visa.thankyou.title')</h1>
        <p>@lang('visa.thankyou.text')</p>
      </div>
    </div>
  </body>
</html>