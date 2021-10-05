@extends('layouts.app')


@section('content')

    <div class="row justify-content-center ">

        <div class="col-md-10 mt-3">
            @include('_partials.success')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Znalosti</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('skills.store')}}" method="post">
                        @csrf

                        <div class="row">
                            @include('_partials.skillForm')
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark" for="level">Úroveň</label>
                                    <select class="form-control @error('level') is-invalid @enderror" id="level"
                                            name="level">
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary">Uložiť a pokračovať</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
