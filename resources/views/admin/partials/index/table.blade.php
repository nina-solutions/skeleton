
<div class="box-body table-responsive no-padding">
  <table class="table table-hover">
    <tr>
<?php $iterator = 0; ?>
@foreach($table->columns as $idx => $c)
      <th>{{ $c }}</th>
<?php $iterator ++; ?>
@endforeach
<?php unset($iterator); ?>


      <th></th>
    </tr>
<?php $iterator = 0; ?>
@foreach($data as $idx => $d)
@can('index', $d)
    <tr>
<?php $i = 0; ?>
@foreach($table->columns as $key => $c)
      <td>
@if(isset($table->modifiers) && isset($table->modifiers[$key]) )<span class="label {{ 'label-'.$d->{$table->modifiers[$key]} }}">{{ $d->$key }}</span>
@else{{ $d->$key }}
@endif

      </td>
<?php $i ++; ?>
@endforeach
<?php unset($i); ?>


      <td>
@can('edit', $d)<a href="{{ action("$table->controller@edit", array_merge(["id" => $d->id], (isset($table->contentable_type) ? ["contentable_type" => $table->contentable_type]: []))) }}"><span class="glyphicon glyphicon-edit"></span></a>
@endcan

@can('show', $d)<a href="{{ action("$table->controller@show", array_merge(["id" => $d->id], (isset($table->contentable_type) ? ["contentable_type" => $table->contentable_type]: []))) }}"><span class="glyphicon glyphicon-search"></span></a>
@endcan

      </td>
    </tr>
@endcan

<?php $iterator ++; ?>
@endforeach
<?php unset($iterator); ?>


  </table>
</div>