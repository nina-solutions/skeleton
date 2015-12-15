<!DOCTYPE html>
<html>
  <head>
    <script src="{{ URL::asset("js/jquery/jquery.js") }}" rel="javascript"></script>
    <script src="{{ URL::asset("js/bootstrap/bootstrap.js") }}" rel="javascript"></script>
    <script src="{{ URL::asset("js/bootstrap/bootstrap/validator.js") }}" rel="javascript"></script>
    <link href="{{ elixir("css/app.css") }}" rel="stylesheet">
    <script src="{{ elixir("js/app.js") }}" rel="javascript" defer="defer"></script>
    <title>@lang('visa.email.object',['type' => $type, 'code' => $code])</title>
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

        <div style="margin:2em;padding:0;letter-spacing:0.05em;background-color:#fff;">
          <h1 style="margin:1em 1em 2em 0;font:bold 16px arial;border-bottom:solid 1px #ccc;">@lang('visa.email.object',['type' => $type, 'code' => $code])</h1>
          <div style="margin:1em 1em 1em 1em;font:12px arial; line-height:1.6em;">
            <p>@lang('visa.email.text',['code' => $code, 'user' => $user])</p>
          </div>
          <div style="margin:3em 1em 1em 0;font:10px arial;border-top:solid 1px #ccc;">
            <p>@lang('visa.email.footer')</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>