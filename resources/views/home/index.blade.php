@extends('layouts.app')

@section('content')
    <section class="home d-flex justify-content-center align-items-center flex-column">

        <div class="cv d-flex justify-content-center align-items-center flex-column">
            <h2>Životopis</h2>

            @if(auth()->user())
                @if( auth()->user()->userDetail)
                    <span>
                <a class="btn btn-lg btn-outline-warning shadow" href="{{route('user-details.index')}}">
                    Môj CV profil
                </a>
            </span>
                @endif
            @else
                <span>
                <a class="btn btn-lg btn-outline-secondary" href="{{route('user-details.create')}}">Vytvor si svoj
                    životopis</a>
            </span>
            @endif
            @if(auth()->user())
                @if(!auth()->user()->userDetail)
                    <span>
                <a class="btn btn-lg btn-outline-secondary" href="{{route('user-details.create')}}">Vytvor si svoj
                    životopis</a>
            </span>
                @endif
            @endif
        </div>

    </section>
@endsection
