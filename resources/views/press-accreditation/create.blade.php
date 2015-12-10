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
{!! Form::open(array('route' => array('press-save', $role, $code), 'data-toggle' => 'validator', 'class' => 'form-horizontal hub-press', 'files' => true)) !!}

                <fieldset>
                  <legend>@lang('press.contact.head')</legend>
@if(isset($fields['ANA_NOME']))
                                  <div class="form-group">
{!! Form::label('ANA_NOME', trans('press.contact.name'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">
{!! Form::text('ANA_NOME', Input::old('ANA_NOME'), array((in_array('required',$fields['ANA_NOME'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans('press.contact.name'))) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['ANA_COGNOME']))
                                  <div class="form-group">
{!! Form::label('ANA_COGNOME', trans('press.contact.surname'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">
{!! Form::text('ANA_COGNOME', Input::old('ANA_COGNOME'), array((in_array('required',$fields['ANA_COGNOME'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans('press.contact.surname'))) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['AS_TESSERA']))
                                  <div class="form-group">
{!! Form::label('AS_TESSERA', trans('press.contact.cardnr'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">
{!! Form::text('AS_TESSERA', Input::old('AS_TESSERA'), array((in_array('required',$fields['AS_TESSERA'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans('press.contact.cardnr'))) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['ANA_EMAIL']))
                                  <div class="form-group">
{!! Form::label('ANA_EMAIL', trans('press.contact.email'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">
{!! Form::email('ANA_EMAIL', Input::old('ANA_EMAIL'), array((in_array('required',$fields['ANA_EMAIL'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans('press.contact.email'))) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['ANA_CELLULARE']))
                                  <div class="form-group">
{!! Form::label('ANA_CELLULARE', trans('press.contact.mobile'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">
{!! Form::text('ANA_CELLULARE', Input::old('ANA_CELLULARE'), array((in_array('required',$fields['ANA_CELLULARE'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans('press.contact.mobile'))) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['SOC_ID']))
                                  <div class="form-group">
{!! Form::label('SOC_ID', trans('press.contact.qualification'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">
{!! Form::select('SOC_ID', $qualifications, Input::old('SOC_ID'), array((in_array('required',$fields['SOC_ID'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans('press.select.qualification'))) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['RMC_ALTRO']))
                                  <div class="form-group hidden">
{!! Form::label('RMC_ALTRO', trans('press.contact.other'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">
{!! Form::text('RMC_ALTRO', Input::old('RMC_ALTRO'), array('class'=>'form-control', 'placeholder'=>trans('press.contact.other'))) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['UTY_ID']))
                                  <div class="form-group">
{!! Form::label('UTY_ID',trans('press.contact.workfor'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">
{!! Form::select('UTY_ID', $workfor, Input::old('UTY_ID'), array((in_array('required',$fields['UTY_ID'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans('press.select.workfor'))) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['ANA_TWITTER_ACCOUNT']))
                                  <div class="form-group">
{!! Form::label('ANA_TWITTER_ACCOUNT',trans('press.contact.twitter'), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-9">
{!! Form::text('ANA_TWITTER_ACCOUNT', Input::old('ANA_TWITTER_ACCOUNT'), array((in_array('required',$fields['ANA_TWITTER_ACCOUNT'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans('press.contact.twitter'))) !!}

                                    </div>
                                  </div>
@endif

                </fieldset>
@if(isset($fields['AS_NOME_TESTATA']))
                                <fieldset>
                                  <legend>@lang('press.newspaper.head')</legend>
@if(isset($fields['AS_NOME_TESTATA']))
                                                  <div class="form-group">
{!! Form::label('AS_NOME_TESTATA', trans('press.newspaper.name'), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::text('AS_NOME_TESTATA', Input::old('AS_NOME_TESTATA'), array(in_array('required',$fields['AS_NOME_TESTATA'])?'required':'', 'class'=>'form-control', 'placeholder'=>trans('press.newspaper.name'))) !!}

                                                    </div>
                                                  </div>
@endif

                                  <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                      <div class="well well-sm">@lang('press.newspaper.first')</div>
                                    </div>
                                  </div>
@if(isset($fields['AS_ADDRESS']))
                                                  <div class="form-group">
{!! Form::label('AS_ADDRESS', trans('press.newspaper.address'), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::text('AS_ADDRESS', Input::old('AS_ADDRESS'), array(in_array('required',$fields['AS_ADDRESS'])?'required':'', 'class'=>'form-control', 'placeholder'=>trans('press.newspaper.address'))) !!}

                                                    </div>
                                                  </div>
@endif

@if(isset($fields['AS_CITY']))
                                                  <div class="form-group">
{!! Form::label('AS_CITY', trans('press.newspaper.city'), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::text('AS_CITY', Input::old('AS_CITY'), array(in_array('required',$fields['AS_CITY'])?'required':'', 'class'=>'form-control', 'placeholder'=>trans('press.newspaper.city'))) !!}

                                                    </div>
                                                  </div>
@endif

@if(isset($fields['AS_CAP']))
                                                  <div class="form-group">
{!! Form::label('AS_CAP', trans('press.newspaper.zip'), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::text('AS_CAP', Input::old('AS_CAP'), array(in_array('required',$fields['AS_CAP'])?'required':'', 'class'=>'form-control', 'placeholder'=>trans('press.newspaper.zip'))) !!}

                                                    </div>
                                                  </div>
@endif

                                  <!--Tricky..apparently who made the DB doesn't know that VR is not a country but is a-->
@if(isset($fields['AS_COUNTRY']))
                                                  <div class="form-group">
{!! Form::label('AS_COUNTRY', trans('press.newspaper.province'), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::select('AS_COUNTRY', $provences, Input::old('AS_COUNTRY'), array(in_array('required',$fields['AS_COUNTRY'])?'required':'', 'class'=>'form-control', 'placeholder'=>trans('press.select.province'))) !!}

                                                    </div>
                                                  </div>
@endif

                                  <!--Tricky..apparently who made the DB doesn't know that States indicates internal separationI.E USA is divided into regions, or states
                                  -->
@if(isset($fields['AS_STATES']))
                                                  <div class="form-group">
{!! Form::label('AS_STATES', trans('press.newspaper.nationality'), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::select('AS_STATES', $nations, Input::old('AS_STATES'), array(in_array('required',$fields['AS_STATES'])?'required':'', 'class'=>'form-control', 'placeholder'=>trans('press.select.nationality'))) !!}

                                                    </div>
                                                  </div>
@endif

@if(isset($fields['AS_PERIODICITA']))
                                                  <div class="form-group">
{!! Form::label('AS_PERIODICITA', trans('press.newspaper.schedule'), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::select('AS_PERIODICITA', $schedule, Input::old('AS_PERIODICITA'), array(in_array('required',$fields['AS_PERIODICITA'])?'required':'', 'class'=>'form-control', 'placeholder'=>trans('press.select.schedule'))) !!}

                                                    </div>
                                                  </div>
@endif

@if(isset($fields['AS_EMAIL']))
                                                  <div class="form-group">
{!! Form::label('AS_EMAIL', trans('press.newspaper.email'), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::email('AS_EMAIL', Input::old('AS_EMAIL'), array(in_array('required',$fields['AS_EMAIL'])?'required':'', 'class'=>'form-control', 'placeholder'=>trans('press.newspaper.email'))) !!}

                                                    </div>
                                                  </div>
@endif

@if(isset($fields['AS_PHONE']))
                                                  <div class="form-group">
{!! Form::label('AS_PHONE', trans('press.newspaper.phone'), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::text('AS_PHONE', Input::old('AS_PHONE'), array(in_array('required',$fields['AS_PHONE'])?'required':'', 'class'=>'form-control', 'placeholder'=>trans('press.newspaper.phone'))) !!}

                                                    </div>
                                                  </div>
@endif

@if(isset($fields['AS_WWW']))
                                                  <div class="form-group">
{!! Form::label('AS_WWW', trans('press.newspaper.website'), ['class' => 'control-label col-md-3']) !!}

                                                    <div class="col-md-9">
{!! Form::text('AS_WWW', Input::old('AS_WWW'), array(in_array('required',$fields['AS_WWW'])?'required':'', 'class'=>'form-control', 'placeholder'=>trans('press.newspaper.website'))) !!}

                                                    </div>
                                                  </div>
@endif

                                </fieldset>
@endif

@if(isset($fields['ANA_PRIMA_VISITA']))
                                <fieldset>
                                  <legend>@lang('press.firsttime.head')</legend>
                                  <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
{!! Form::label('ANA_PRIMA_VISITA', trans('press.firsttime.no'), array('class'=>'radio-inline')) !!}

{!! Form::radio('ANA_PRIMA_VISITA', 0, (Input::old('ANA_PRIMA_VISITA') === 0 ? true : false), array(in_array('required',$fields['ANA_PRIMA_VISITA'])?'required':'', 'class'=>'radio-inline')) !!}

{!! Form::label('ANA_PRIMA_VISITA', trans('press.firsttime.yes'), array('class'=>'radio-inline')) !!}

{!! Form::radio('ANA_PRIMA_VISITA', 1, (Input::old('ANA_PRIMA_VISITA') === 1 ? true : false), array(in_array('required',$fields['ANA_PRIMA_VISITA'])?'required':'', 'class'=>'radio-inline')) !!}

                                    </div>
                                  </div>
                                </fieldset>
@endif

                <fieldset class="hidden">
                  <legend>@lang('press.upload.head')</legend>
@if(isset($fields['ANA_FILENAME1']))
                                  <div class="form-group">
@if(is_array(trans('press.upload.file1.'.$channel)))
<?php $num = 0; ?>
@foreach(trans('press.upload.file1.'.$channel) as $key => $label)
{!! Form::label('ANA_FILENAME1', $label, ['class' => $key. ' control-label col-md-6']) !!}

<?php $num ++; ?>
@endforeach
<?php unset($num); ?>


@else
{!! Form::label('ANA_FILENAME1', trans('press.upload.file1.'.$channel), ['class' => 'control-label col-md-6']) !!}

@endif

                                    <div class="col-md-6">
{!! Form::file('ANA_FILENAME1', Input::old('ANA_FILENAME1'), array(in_array('required',$fields['ANA_FILENAME1'])?'required':'', 'class'=>'form-control')) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['ANA_FILENAME2']))
                                  <div class="form-group">
{!! Form::label('ANA_FILENAME2', trans('press.upload.file2.'.$channel), ['class' => 'control-label col-md-6']) !!}

                                    <div class="col-md-6">
{!! Form::file('ANA_FILENAME2', Input::old('ANA_FILENAME2'), array(in_array('required',$fields['ANA_FILENAME2'])?'required':'', 'class'=>'form-control')) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['ANA_FILENAME3']))
                                  <div class="form-group">
{!! Form::label('ANA_FILENAME3', trans('press.upload.file3.'.$channel), ['class' => 'control-label col-md-6']) !!}

                                    <div class="col-md-6">
{!! Form::file('ANA_FILENAME3', Input::old('ANA_FILENAME3'), array(in_array('required',$fields['ANA_FILENAME3'])?'required':'', 'class'=>'form-control')) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['ANA_FILENAME4']))
                                  <div class="form-group">
{!! Form::label('ANA_FILENAME4', trans('press.upload.file4.'.$channel), ['class' => 'control-label col-md-6']) !!}

                                    <div class="col-md-6">
{!! Form::file('ANA_FILENAME4', Input::old('ANA_FILENAME4'), array(in_array('required',$fields['ANA_FILENAME4'])?'required':'', 'class'=>'form-control')) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['ANA_FILENAME5']))
                                  <div class="form-group">
{!! Form::label('ANA_FILENAME5', trans('press.upload.file5.'.$channel), ['class' => 'control-label col-md-6']) !!}

                                    <div class="col-md-6">
{!! Form::file('ANA_FILENAME5', Input::old('ANA_FILENAME5'), array(in_array('required',$fields['ANA_FILENAME5'])?'required':'', 'class'=>'form-control')) !!}

                                    </div>
                                  </div>
@endif

@if(isset($fields['ANA_LINK_ARTICOLI']))
                                  <div class="form-group">
@if(is_array(trans('press.upload.analink.'.$channel)))
<?php $num = 0; ?>
@foreach(trans('press.upload.analink.'.$channel) as $key => $label)
{!! Form::label('ANA_LINK_ARTICOLI', $label, ['class' => $key. ' control-label col-md-3']) !!}

<?php $num ++; ?>
@endforeach
<?php unset($num); ?>


@else
{!! Form::label('ANA_LINK_ARTICOLI', trans('press.upload.analink.'.$channel), ['class' => 'control-label col-md-3']) !!}

@endif

                                    <div class="col-md-9">
{!! Form::textarea('ANA_LINK_ARTICOLI', Input::old('ANA_LINK_ARTICOLI'), array((in_array('required',$fields['ANA_LINK_ARTICOLI'])?'required':''), 'class'=>'form-control', 'placeholder'=>'Link')) !!}

                                    </div>
                                  </div>
@endif

                </fieldset>
@if(isset($fields['ANA_CONSENSO']))
                                <fieldset>
                                  <legend>@lang('press.privacy.head')</legend>
                                  <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                      <div class="checkbox">
                                        <label for="ANA_CONSENSO" class="checkbox">
{!! Form::checkbox('ANA_CONSENSO', 'SI', (Input::old('ANA_CONSENSO') ? true : false), array(in_array('required',$fields['ANA_CONSENSO'])?'required':'', 'class'=>'')) !!}
@lang('press.privacy.checkbox')
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </fieldset>
@endif

@if(isset($fields['AS_COMUNICAZIONI']))
                                <fieldset>
                                  <legend>@lang('press.communications.head')</legend>
                                  <div class="form-group">
                                    <div class="col-md-12">
{!! Form::textarea('AS_COMUNICAZIONI', Input::old('AS_COMUNICAZIONI'), array((in_array('required',$fields['AS_COMUNICAZIONI'])?'required':''), 'class'=>'form-control', 'placeholder'=>trans('press.communications.head'))) !!}

                                    </div>
                                  </div>
                                </fieldset>
@endif

@if(isset($fields['human']))
                                <fieldset>
                                  <legend>@lang('press.human.head')</legend>
                                  <div class="form-group">
{!! Form::label('human', trans('press.human.question', ['a'=>array_pop($captcha), 'b'=>array_pop($captcha)]), ['class' => 'control-label col-md-3']) !!}

                                    <div class="col-md-6">
{!! Form::text('human', null, array(in_array('required',$fields['human'])?'required':'', 'class'=>'form-control', 'placeholder'=>trans('press.human.placeholder'))) !!}

                                    </div>
                                  </div>
                                </fieldset>
@if(isset($fields['IS_BLOGGER']))
{!! Form::hidden('IS_BLOGGER', Input::old('IS_BLOGGER')) !!}

@endif

@if(isset($fields['IS_FOTOGRAFO']))
{!! Form::hidden('IS_FOTOGRAFO', Input::old('IS_FOTOGRAFO')) !!}

@endif

@if(isset($fields['IS_OTHER']))
{!! Form::hidden('IS_OTHER', Input::old('IS_OTHER')) !!}

@endif

{!! Form::hidden('channel', $channel) !!}

@endif

                <fieldset>
                  <legend>@lang('press.actions.head')</legend>
                  <div class="form-group col-md-12">
                    <p><strong>@lang('press.actions.description')</strong></p>
                    <div class="well well-sm">@lang('press.actions.notice')</div>
                  </div>
                  <div class="form-group col-md-12">
@if(env('APP_ENV') == 'testing')
{!! Form::submit('submit', array('class' => 'btn btn-primary', 'name' => 'submit')) !!}

@endif

{!! Form::submit(trans('press.actions.submit', ['fair_name' => 'FAIR NAME']), array('class' => 'btn btn-primary', 'name' => 'submit')) !!}

{!! Form::reset(trans('press.actions.reset'), array('class' => 'btn')) !!}

                  </div>
                </fieldset>
{!! Form::close() !!}

      </div>
    </div>
  </body>
</html>