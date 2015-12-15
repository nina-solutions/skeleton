
<?php $rOptions = 0; ?>
@foreach($embassies as $value => $option)
{!! Form::radio($fieldName, $value, ($default == $value ? true : false), array('required', 'class'=>'radio-inline','id'=>$fieldName.'-'.$value  )) !!}

{!! Form::label($fieldName.'-'.$value, trans($option), array('class'=>'radio-inline')) !!}

<?php $rOptions ++; ?>
@endforeach
<?php unset($rOptions); ?>

