<!DOCTYPE html>
<html>
  <head>
    <script src="{{ URL::asset("js/jquery/jquery.js") }}" rel="javascript"></script>
    <script src="{{ URL::asset("js/bootstrap/bootstrap.js") }}" rel="javascript"></script>
    <script src="{{ URL::asset("js/bootstrap/bootstrap/validator.js") }}" rel="javascript"></script>
    <link href="{{ elixir("css/app.css") }}" rel="stylesheet">
    <script src="{{ elixir("js/app.js") }}" rel="javascript" defer="defer"></script>
    <title>@lang('press.register')</title>
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

        <h1>@lang('press.register')</h1>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Campo</th>
              <th>Valore</th>
            </tr>
          </thead>
          <tbody>
<?php $iterator = 0; ?>
@foreach($fields as $idx => $field)
@if(isset($input[$field]))
                                    <tr>
                                      <td>{{$field}}</td>
                                      <td>{{$input[$field]}}</td>
                                    </tr>
@endif

<?php $iterator ++; ?>
@endforeach
<?php unset($iterator); ?>


          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>