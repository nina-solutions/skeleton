<!DOCTYPE html>
<html>
  <head>
    <script src="{{ URL::asset("js/jquery/jquery.js") }}" rel="javascript"></script>
    <script src="{{ URL::asset("js/bootstrap/bootstrap.js") }}" rel="javascript"></script>
    <script src="{{ URL::asset("js/bootstrap/bootstrap/validator.js") }}" rel="javascript"></script>
    <link href="{{ elixir("css/app.css") }}" rel="stylesheet">
    <script src="{{ elixir("js/app.js") }}" rel="javascript" defer="defer"></script>
    <title>@lang('visa.register')</title>
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

        <h1>@lang('visa.register')</h1>
{!! Form::open(array('route' => array('visa-save', $lang, $type, $code), 'data-toggle' => 'validator', 'class' => 'form-horizontal hub-visa', 'files' => false)) !!}

                <!--cicling all fieldset-->
<?php $fieldsetIncrement = 0; ?>
@foreach($visaFields as $fieldsetName => $fieldset)
                        <fieldset>
@if(isset($fieldset["legend"]))
                                          <legend>@lang($fieldset["legend"])</legend>
@endif

                          <!--cicling all fields-->
<?php $fieldIncrement = 0; ?>
@foreach($fieldset["fields"] as $fieldName => $field)
@if($field['type'] == 'text')
                                                  <div class="form-group">
{!! Form::label($fieldName, trans($field['label']) . (in_array('required',$field['rules'])?' *':''), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::text($fieldName, Input::old($fieldName), array((in_array('required',$field['rules'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans( $field['label']))) !!}

                                                    </div>
                                                  </div>
@endif

@if($field['type'] == 'textarea')
                                                  <div class="form-group">
{!! Form::label($fieldName, trans($field['label']) . (in_array('required',$field['rules'])?' *':''), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::textarea($fieldName, Input::old($fieldName), array((in_array('required',$field['rules'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans( $field['label']))) !!}

                                                    </div>
                                                  </div>
@endif

@if($field['type'] == 'email')
                                                  <div class="form-group">
{!! Form::label($fieldName, trans($field['label']) . (in_array('required',$field['rules'])?' *':''), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::email($fieldName, Input::old($fieldName), array((in_array('required',$field['rules'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans( $field['label']))) !!}

                                                    </div>
                                                  </div>
@endif

@if($field['type'] == 'url')
                                                  <div class="form-group">
{!! Form::label($fieldName, trans($field['label']) . (in_array('required',$field['rules'])?' *':''), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::url($fieldName, Input::old($fieldName), array((in_array('required',$field['rules'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans( $field['label']))) !!}

                                                    </div>
                                                  </div>
@endif

@if($field['type'] == 'hidden')
{!! Form::hidden($fieldName, Input::old($fieldName)) !!}

@endif

@if($field['type'] == 'date')
                                                  <div class="form-group">
{!! Form::label($fieldName, trans($field['label']) . (in_array('required',$field['rules'])?' *':''), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::date($fieldName, Input::old($fieldName), array((in_array('required',$field['rules'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans( $field['label']))) !!}

                                                    </div>
                                                  </div>
@endif

@if($field['type'] == 'radio')
                                                  <div class="form-group">
{!! Form::label($fieldName, trans($field['label']) . (in_array('required',$field['rules'])?' *':''), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
<?php $rOptions = 0; ?>
@foreach($field["options"] as $value => $option)
{!! Form::radio($fieldName, $value, (Input::old($fieldName) === $value ? true : false), array((in_array('required',$field['rules'])?'required':''), 'class'=>'radio-inline','id'=>$fieldName.'-'.$value  )) !!}

{!! Form::label($fieldName.'-'.$value, trans($option), array('class'=>'radio-inline')) !!}

<?php $rOptions ++; ?>
@endforeach
<?php unset($rOptions); ?>


                                                    </div>
                                                  </div>
@endif

@if($field['type'] == 'select')
                                                  <div class="form-group">
{!! Form::label($fieldName, trans($field['label']) . (in_array('required',$field['rules'])?' *':''), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::select($fieldName, $field['options'], Input::old($fieldName), array((in_array('required',$field['rules'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans( $field['label']))) !!}

                                                    </div>
                                                  </div>
@endif

@if($field['type'] == 'vits_codice')
                                                  <div class="form-group vits_codice__wrapper">
{!! Form::label($fieldName, trans($field['label']) . (in_array('required',$field['rules'])?' *':''), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9 vits_codice__content">
{!! Form::hidden($fieldName, Input::old($fieldName)) !!}

                                                    </div>
                                                  </div>
@endif

<?php $fieldIncrement ++; ?>
@endforeach
<?php unset($fieldIncrement); ?>


                        </fieldset>
<?php $fieldsetIncrement ++; ?>
@endforeach
<?php unset($fieldsetIncrement); ?>


                <fieldset>
                  <legend>@lang('visa.form.information_letter')</legend>
                  <div class="form-group">
                    <div class="col-xs-12">
                      <div class="scrollableText">@lang('visa.form.information_letter_text')</div>
                    </div>
                  </div>
                </fieldset>
                <fieldset>
                  <legend>@lang('visa.form.request')</legend>
{!! Form::submit(trans('visa.form.submit'), array('class' => 'btn btn-primary', 'name' => 'submit')) !!}

{!! Form::reset(trans('visa.form.reset'), array('class' => 'btn')) !!}

                </fieldset>
{!! Form::close() !!}

      </div>
    </div>
  </body>
</html>