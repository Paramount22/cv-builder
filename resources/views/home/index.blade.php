@extends('layouts.app')

@section('content')
    <section class="home">
        <h2 class="text-dark">Životopis</h2>

        @if(auth()->user())
            @if( auth()->user()->userDetail)
                <span>
                <a class="btn btn-lg btn-outline-warning shadow" href="{{route('user-details.index')}}">
                    Môj profil
                </a>
            </span>
            @endif

        @else
            <span>
                <a class="btn btn-lg btn-outline-primary" href="{{route('user-details.create')}}">Vytvor si svoj životopis</a>
            </span>
        @endif

        @if(auth()->user())
            @if(!auth()->user()->userDetail)
                <span>
                <a class="btn btn-lg btn-outline-primary" href="{{route('user-details.create')}}">Vytvor si svoj životopis</a>
            </span>
            @endif
        @endif
    </section>
@endsection
