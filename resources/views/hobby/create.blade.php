@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            @include('_partials.success')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Záujmy alebo koníčky </h6>
                </div>
                <div class="card-body">
                    <form action="{{route('hobby.store')}}" method="post">
                        @csrf
                        @include('_partials.hobbyForm')

                        <div class="form-group">
                            <button class="btn btn-primary">Uložiť</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
