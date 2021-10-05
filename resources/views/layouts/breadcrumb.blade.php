@auth
    @if(auth()->user()->userDetail)
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item {{request()->is('user-details') ? 'active' : ''}}">
                        <a class="text-dark" href="{{route('user-details.index')}}">
                            Základné údaje
                        </a>
                    </li>


                <li class="breadcrumb-item {{request()->is('education') ? 'active' : ''}}">
                    <a class="text-dark" href="{{route('education.index')}}">
                        Vzdelanie
                    </a>
                </li>

                <li class="breadcrumb-item {{request()->is('works') ? 'active' : ''}}">
                    <a class="text-dark" href="{{route('works.index')}}">
                        Pracovné skúsenosti
                    </a>
                </li>

                <li class="breadcrumb-item {{request()->is('courses') ? 'active' : ''}}">
                    <a class="text-dark" href="{{route('courses.index')}}">
                        Kurzy
                    </a>
                </li>

                <li class="breadcrumb-item {{request()->is('skills') ? 'active' : ''}}">
                    <a class="text-dark" href="{{route('skills.index')}}">
                        Znalosti
                    </a>
                </li>

                <li class="breadcrumb-item {{request()->is('languages') ? 'active' : ''}}">
                    <a class="text-dark" href="{{route('languages.index')}}">
                        Jazyky
                    </a>
                </li>

                <li class="breadcrumb-item {{request()->is('hobby') ? 'active' : ''}}">
                    <a class="text-dark" href="{{route('hobby.index')}}">
                        Záujmy alebo koníčky
                    </a>
                </li>

            </ol>
        </nav>
    @endif
@endauth
