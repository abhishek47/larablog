<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><i class="glyphicon glyphicon-asterisk"></i> </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Active::pattern('admin') }}"><a href="{{ url('/admin') }}"><i class="glyphicon glyphicon-th"></i> Dashboard</a></li>
                <li class="{{ Active::pattern('admin/articles') }}"><a href="{{ url('/admin/articles') }}"><i class="glyphicon glyphicon-book"></i> Content</a></li>
                <li class="{{ Active::pattern('articles/create') }}"><a href="{{ url('/articles/create') }}"><i class="glyphicon glyphicon-plus"></i> New Article</a></li>
                <li class="{{ Active::pattern('admin/tags') }}"><a href="{{ url('/admin/tags') }}"><i class="glyphicon glyphicon-tags"></i> Tags</a></li>
                <li class="{{ Active::pattern('admin/settings') }}"><a href="{{ url('/admin/settings') }}"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                <li><a href="{{ url('/auth/login') }}">Login</a></li>
                <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>