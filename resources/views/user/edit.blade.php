@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            @include('_partials.success')
            <update-email :user="{{$user}}" inline-template>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 text-dark">Zmena e-mailovej adresy</h6>
                    </div>

                    <div class="card-body">
                        <form action="{{route('user.email.update', $user)}}" method="post"
                              @submit.prevent="updateEmail">

                            <div class="form-group">
                                <label for="email">E-mailová adresa</label>
                                <input id="email" type="text" name="email" class="form-control"
                                v-model="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn btn-dark">Uložiť</button>
                            </div>
                        </form>
                    </div>
                </div>
            </update-email>

        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 text-dark">Zmena hesla</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('user.password.update', $user)}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="old_password">Staré heslo</label>
                            <input type="password" class="form-control @error('old_password') is-invalid
                                    @enderror" name="old_password"
                                   id="old_password">
                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new_password">Nové heslo</label>
                            <input type="password" class="form-control @error('old_password') is-invalid
                                    @enderror" name="new_password" id="new_password">

                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Potvrdiť nové heslo</label>
                            <input type="password" class="form-control @error('confirm_password') is-invalid
                                    @enderror" name="confirm_password" id="confirm_password">

                            @error('confirm_password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-dark">Uložiť</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
