@extends('layouts.app')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('_partials.success')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kontaktné údaje</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('user-details.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('_partials.userDetailForm')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="accordion mb-3" id="accordionExample">
                                    <div class="card mb-3">
                                        <div class="card-header" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left text-info" type="button" data-toggle="collapse"
                                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Vodičský preukaz
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                             data-parent="#accordionExample">
                                            <ul class="list-group">
                                                @if(isset($drivingLicense))
                                                    @foreach($drivingLicense as $license)
                                                        <li class="list-group-item d-flex justify-content-between">
                                                            <div class="form-check d-flex align-items-center">
                                                                <input class="form-check-input" type="checkbox"
                                                                       name="driving_licenses[]"
                                                                       value="{{$license->id}}"
                                                                       id="{{$license->group}}">
                                                                <label class="form-check-label ml-2 label-text-group" for="{{$license->group}}">
                                                                    {{$license->group}}
                                                                </label>
                                                            </div>

                                                            {{-- --}}   @if($license->id === 1)
                                                                <span>
                                        <i class="fas fa-motorcycle fa-2x"></i>
                                    </span>
                                                            @endif
                                                            @if($license->id === 2)
                                                                <span>
                                        <i class="fas fa-car fa-2x"></i>
                                    </span>
                                                            @endif
                                                            @if($license->id === 3)
                                                                <span>
                                        <i class="fas fa-truck fa-2x"></i>
                                    </span>
                                                            @endif
                                                            @if($license->id === 4)
                                                                <span>
                                        <i class="fas fa-bus fa-2x"></i>
                                    </span>
                                                            @endif
                                                            @if($license->id === 5)
                                                                <span>
                                        <i class="fas fa-truck-moving fa-2x"></i>
                                    </span>
                                                            @endif
                                                            @if($license->id === 6)
                                                                <span>
                                        <i class="fas fa-tractor fa-2x"></i>
                                    </span>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
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
