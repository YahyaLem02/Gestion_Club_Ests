 <!--header section start -->
 <div class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo" id="logo"><a href="{{route('home')}}"><img src="images/logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    {{-- @guest --}}
                    @if ((Auth::check()) && (Auth::user()) && (!Auth::user()->isadmin) && (!Auth::user()->isroot))
                    <li class="nav-item active">
                        <a class="nav-link" id="connecter-button" href="{{route('reclamation.create') }}">Ajouter un
                        reclamation</a>
                    </li>
                    @endif
                    @if ((Auth::check()) && (Auth::user()) && (Auth::user()->isadmin) && (!Auth::user()->isroot))
                   
                    <li class="nav-item active">
                        <a class="nav-link" id="connecter-button" href="{{route('feedback.index')}}">Gestion des reclamations</a>
                    </li>
                    @endif
                    @if ((Auth::check()) && (Auth::user()) && (!Auth::user()->isadmin) && (Auth::user()->isroot))
                   
                    <li class="nav-item active">
                        <a class="nav-link" id="connecter-button" href="{{route('Club.index')}}">Gestion des clubs</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" id="connecter-button" href="{{route('admin.index')}}">Gestion des admins</a>
                    </li>
                    @endif
                    @if ((Auth::check()) && (Auth::user()) && (!Auth::user()->isadmin) && (!Auth::user()->isroot))
                   
                    <li class="nav-item active">
                        <a class="nav-link" id="connecter-button" href="{{route('reclamation.index')}}">Reclamations</a>
                    </li>
                    @endif
                    @if (!(Auth::check()))
                   
                    <li class="nav-item active">
                        <a class="nav-link" id="connecter-button" href="{{route('login')}}">Connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sinscrire-button" href="{{route('register')}}">S'inscrire</a>
                    </li>
                    @endif
                    @if((Auth::check()))
                    <li class="nav-item">
                            <a class="nav-link" id="connecter-button" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Deconnexion') }}
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                             {{ Auth::user()->name }}
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
<!--header section end -->