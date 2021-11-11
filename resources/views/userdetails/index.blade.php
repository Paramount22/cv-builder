@extends('layouts.app')

@section('content')
    <section class="user-detail">
        <div class="row justify-content-center mb-4">
            <div class="col-8">
                <h2 class="text-white text-bold">Základné údaje</h2>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('_partials.success')
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h4 class="card-title text-dark">{{$userDetail->fullName}}</h4>
                            <span>
                                <a class="text-danger" href="" data-toggle="modal"
                                   data-target="#editUserModal-{{$userDetail->id}}">Upraviť</a>
                            </span>
                        </div>

                        <h6 class="card-subtitle mb-4 text-muted">{{$userDetail->formatDate}}</h6>
                        <h5 class="text-dark mb-3"> Kontaktné údaje </h5>
                        <p class="card-text">
                            <i class="far fa-envelope"></i>
                           <strong>E-mailová adresa:</strong>  {{auth()->user()->email}}
                        </p>

                        <p class="card-text">
                            <i class="fas fa-phone-alt"></i>
                            <strong>Telefónne číslo:</strong> {{$userDetail->phone}}
                        </p>

                        <p class="card-text">
                            <i class="fas fa-home"></i>
                            <strong>Adresa:</strong> {{$userDetail->fullAddress}}
                        </p>
                        <p class="card-text mb-3">
                            <i class="far fa-address-card"></i>
                           <strong>Vodičský preukaz:</strong>
                            @if($userDetail->drivingLicenses)
                                @foreach($userDetail->drivingLicenses as $group)
                                    <span class="badge badge-success">{{ $group->group}}</span>
                                @endforeach
                            @endif
                        </p>
                        @if(  auth()->user()->education->count() )
                            <span class="d-flex justify-content-end">
                                <a class="btn btn-outline-dark" href="{{route('education.index')}}">
                                    Pokračovať na vzdelanie
                                </a>
                            </span>
                        @else
                            <span class="d-flex justify-content-end">
                                <a class="btn btn-outline-dark" href="{{route('education.create')}}">
                                    Pokračovať na vzdelanie
                                </a>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editUserModal-{{$userDetail->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Upraviť údaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user-details.update', $userDetail)}}" method="post">
                        @csrf
                        @method('put')
                        @include('_partials.userDetailForm')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card edit-license-group mb-3">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            Vodičský preukaz
                                        </h6>
                                    </div>
                                    <ul class="list-group">
                                        @if(isset($drivingLicense))
                                            @foreach($drivingLicense as $license)
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="driving_licenses[]"
                                                               value="{{$license->id}}"
                                                               id="{{$license->group}}"
                                                            {{($userDetail->drivingLicenses()->pluck('id')->contains($license->id)) ? 'checked' : '' }}
                                                        >

                                                        <label class="form-check-label ml-2 label-text-group" for="{{$license->group}}">
                                                            {{$license->group}}
                                                        </label>
                                                    </div>

                                                   @if($license->id === 1)
                                                        <span>
                                                            <i class="fas fa-motorcycle"></i>
                                                        </span>
                                                    @endif
                                                    @if($license->id === 2)
                                                        <span>
                                                            <i class="fas fa-car"></i>
                                                        </span>
                                                    @endif
                                                    @if($license->id === 3)
                                                        <span>
                                                            <i class="fas fa-truck"></i>
                                                        </span>
                                                    @endif
                                                    @if($license->id === 4)
                                                        <span>
                                                            <i class="fas fa-bus"></i>
                                                        </span>
                                                    @endif
                                                    @if($license->id === 5)
                                                        <span>
                                                            <i class="fas fa-truck-moving"></i>
                                                        </span>
                                                    @endif
                                                    @if($license->id === 6)
                                                        <span>
                                                            <i class="fas fa-tractor"></i>
                                                        </span>
                                                    @endif
                                                </li>
                                            @endforeach
                                        @endif

                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Uložiť zmeny</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
