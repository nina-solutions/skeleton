
<div class="box-tools pull-right">
  <div class="has-feedback">
    <form action="" id="search-form">
{!! Form::hidden('h-search-text', Input::old('h-search-text'), array('id'=>'h-search-text')) !!}

    </form>
{!! Form::text('search-text', Input::old('h-search-text'), array('id'=>'search-text', 'class'=>'form-control input-sm', 'placeholder'=>trans('admin.search.text'))) !!}
<span id="search" class="glyphicon glyphicon-search form-control-feedback"></span>
  </div>
</div>