<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu --> 
        <ul class="sidebar-menu">
            <li class="header">MENÚ</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-joomla'></i> <span>Micrositio</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('unidad-academica.index') }}"><i class='fa fa-cubes'></i> Departamento</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-newspaper-o'></i> <span>Noticias</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('categoria.index') }}"><i class='fa fa-sitemap'></i>Categoría</a></li>
                    <li><a href="{{ route('noticia.index') }}"><i class='fa fa-plus-circle'></i>Nueva</a></li>
                    <li><a href="{{ url('noticia.show') }}"><i class='fa fa-navicon'></i>Listado</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-folder-open-o'></i> <span>Proyectos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('categoria-proyecto.index') }}"><i class='fa fa-sitemap'></i>Categoría</a></li>
                    <li><a href="{{ route('estado-proyecto.index') }}"><i class='fa fa-certificate'></i>Estados</a></li>
                    <li><a href="{{ route('proyecto.index') }}"><i class='fa fa-plus-circle'></i>Nuevo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa  fa-google-wallet'></i> <span>Slider</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('slider.index') }}"><i class='fa fa-plus-circle'></i> Nuevo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-road'></i> <span>Filosofía</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('filosofia.index') }}"><i class='fa fa-plus-circle'></i> Nueva</a></li>
                </ul>
            </li>




            <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#">{{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
