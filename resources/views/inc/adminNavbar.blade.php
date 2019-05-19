<nav class="navbar navbar-expand-md navbar-dark bg-primary navbar-fixed-left">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">
            {{ config('app.name', 'Online Gallery') }}
        </a>
        @if(Auth::check())
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.user.index') }}">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.order.index') }}">Manage Orders</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage Paintings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.painting.index') }}">View Paintings</a>
                        <a class="dropdown-item" href="{{ route('admin.painting.create') }}">Create Paintings</a>
    
                    </div>
                </li>
            </ul>
            
            <ul class="nav navbar-nav ml-auto">
                <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
            </ul>
            @endif
        </div>
    </div>
</nav>
