@extends('layouts.app')


@section('content')

    <div class="row justify-content-center ">

        <div class="col-md-10 mt-3">
            @include('_partials.success')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Vzdelanie</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('education.store')}}" method="post">
                        @csrf
                        @include('_partials.educationForm')

                        <div class="form-group">
                            <button class="btn btn-primary">Uložiť a pokračovať</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
