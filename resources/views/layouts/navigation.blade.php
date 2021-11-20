<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                    <li>
                        <!-- Button trigger modal -->
                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#resumeModal">
                            <i class="fas fa-eye"></i>   Náhľad CV
                        </a>
                    </li>
                @endauth
            </ul>

            <!-- Modal -->
            <div class="modal fade" id="resumeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Náhľad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <iframe src="{{route('resume.index')}}" width="100%" height="900"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavrieť</button>
                            <a href="{{route('resume.download')}}" class="btn btn-danger">
                                <i class="fas fa-download"></i>  Uložiť ako pdf
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Prihlásenie') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrácia') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->email }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('has_access')
                                <a class="dropdown-item" href="{{route('admin.index')}}">
                                    <i class="fas fa-user-shield"></i>  {{ __('Admin') }}
                                </a>
                            @endcan

                            @if(auth()->user()->userDetail)
                                <a class="dropdown-item text-dark" href="{{route('user-details.index')}}">
                                    <i class="fas fa-user"></i>  {{ __('CV Profil') }}
                                </a>
                            @endif
                                <a class="dropdown-item text-dark" href="{{route('user.edit', auth()->user()->id)}}">
                                    <i class="fas fa-unlock"></i>  {{ __('Zmena údajov') }}
                                </a>

                            <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>  {{ __('Odhlásiť sa') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
