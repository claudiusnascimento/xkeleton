<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Modulos</h3>
        <ul class="nav side-menu">

            <li>
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Dashboard </a>
            </li>

            <li>
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-users"></i>
                    Usuários
                </a>

            </li>
            <li>
                <a href="{{ route('pages.index') }}">
                    <i class="fa fa-edit"></i>
                    Páginas
                </a>

            </li>
            <li>
                <a><i class="fa fa-newspaper-o"></i> Blog <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ route('posts.index') }}">Post</a></li>
                    <li><a href="{{ route('post-categories.index') }}">Categoria de Post</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->
