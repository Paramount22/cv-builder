@extends('layouts.admin.admin')

@section('content')
    <h2 class="text-white">Admin panel</h2>

    <div class="mt-4">
        <a class="btn btn-lg btn-outline-info" href="{{route('levels.index')}}">Úrovne</a>
        <a class="btn btn-lg btn-outline-info" href="">Skupiny</a>
    </div>


@endsection
