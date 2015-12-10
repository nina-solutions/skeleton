
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less-->
  <section class="sidebar">
    <!-- Sidebar user panel (optional)-->
    <div class="user-panel">
      <div class="pull-left image"><img src="https://placehold.it/160x160" alt="User Image" class="img-circle"/></div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <!-- Status--><a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form (Optional)-->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" placeholder="Search..." class="form-control"/><span class="input-group-btn">
          <button id="search-btn" type="submit" name="search" class="btn btn-flat"><i class="fa fa-search"></i></button></span>
      </div>
    </form>
    <!-- /.search form-->
    <!-- Sidebar Menu-->
    <ul class="sidebar-menu">
      <li class="header">Gestione contenuti</li>
@can('ContextController@index', 'context_model')
      <li class="treeview {{ !isset($table->contentable_type) ? 'active' : '' }}"><a href="#"><span>Area Admin</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu {{ !isset($table->contentable_type) ? 'active menu-open' : '' }}">
          <!-- Optionally, you can add icons to the links-->
          <li class="{{ (isset($table) && $table->controller == 'CustomController') ? 'active' : '' }}"><a href="{{ action('CustomController@dashboard') }}"><span>Dashboard</span></a></li>
@can('UserController@index', 'user_model')
          <li class="{{ (isset($table) && $table->controller == 'UserController') ? 'active' : '' }}"><a href="{{ action('UserController@index') }}"><span>Utenti</span></a></li>
@endcan

@can('ContextController@index', 'context_model')
          <li class="{{ (isset($table) && $table->controller == 'ContextController') ? 'active' : '' }}"><a href="{{ action('ContextController@index') }}"><span>Fiere</span></a></li>
@endcan

@can('LanguagesController@index', 'language_model')
          <li class="{{ (isset($table) && $table->controller == 'LanguagesController') ? 'active' : '' }}"><a href="{{ action('LanguagesController@index') }}"><span>Lingue</span></a></li>
@endcan

@can('CategoriesController@index', 'category_model')
          <li class="{{ (isset($table) && $table->controller == 'CategoriesController') ? 'active' : '' }}"><a href="{{ action('CategoriesController@index') }}"><span>Categorie</span></a></li>
@endcan

@can('ContentController@index', 'content_model')
          <li class="{{ (isset($table) && $table->controller == 'ContentController') ? 'active' : '' }}"><a href="{{ action('ContentController@index') }}"><span>Content Generico</span></a></li>
@endcan

        </ul>
      </li>
@endcan

      <li class="treeview {{ isset($table->contentable_type) ? 'active' : '' }}"><a href="#"><span>Contenuti</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu {{ isset($table->contentable_type) ? 'active menu-open' : '' }}">
<?php $iterator = 0; ?>
@foreach(Session::get('contents') as $key => $cont)
          <li class="{{ (isset($table->contentable_type) && $table->contentable_type == $key) ? 'active' : '' }}"><a href="{{ action('HubController@index', ['contentable_type' => $key]) }}">{{ $cont['sidebar'] }}</a></li>
<?php $iterator ++; ?>
@endforeach
<?php unset($iterator); ?>


        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu-->
  </section>
  <!-- /.sidebar-->
</aside>