@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <h2 class="text-white mb-4">Úrovne</h2>
    <div class="col-md-4">
        <ul class="list-group">
            @foreach($levels as $level)
                <li class="list-group-item">{{$level->name}}</li>
            @endforeach
        </ul>
    </div>
    <a class="btn btn-sm btn-outline-secondary mt-4" href="{{route('admin.index')}}">Späť</a>

</div>

@endsection
