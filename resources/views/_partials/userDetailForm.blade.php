<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="first-name">Krstné meno</label>
            <input class="form-control @error('firstName') is-invalid
            @enderror" type="text" id="first-name" name="firstName"
           value="@if(isset($userDetail->firstName)){{$userDetail->firstName}} @endif{{old('firstName')}}">
            @error('firstName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="last-name">Priezvisko</label>
            <input class="form-control @error('lastName') is-invalid
            @enderror" type="text" id="last-name" name="lastName"
                   value="@if(isset($userDetail->lastName)){{$userDetail->lastName}} @endif{{old('lastName')}}">

            @error('lastName')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="degree">Titul <i> (nepovinný údaj)  </i> </label>
            <input class="form-control" type="text" id="degree" name="degree"
                   value="@if(isset($userDetail->degree)){{$userDetail->degree}} @endif{{old('degree')}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="birthdate">Dátum narodenia</label>
            <input type="date" id="birthdate"
                   name="birthdate"
                   value="@if(isset($userDetail->birthdate)){{$userDetail->birthdate}}@endif{{old
           ('birthdate')}}"
                   class="form-control @error('birthdate') is-invalid
            @enderror">

            @error('birthdate')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone">Telefónne číslo</label>
            <input class="form-control @error('phone') is-invalid
            @enderror" type="text" id="phone" name="phone"
                   value="@if(isset($userDetail->phone)){{$userDetail->phone}} @endif{{old('phone')}}">

            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="street">Ulica a číslo</label>
            <input class="form-control @error('street') is-invalid
            @enderror" type="text" id="street" name="street"
                   value="@if(isset($userDetail->street)){{$userDetail->street}} @endif{{old('street')}}">

            @error('street')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="postal-code">PSČ</label>
            <input class="form-control @error('postalCode') is-invalid
            @enderror" type="text" id="postal-code" name="postalCode"
                   value="@if(isset($userDetail->postalCode)){{$userDetail->postalCode}} @endif{{old('postalCode')}}">

            @error('postalCode')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="city">Mesto</label>
            <input class="form-control @error('city') is-invalid
            @enderror" type="text" id="city" name="city"
                   value="@if(isset($userDetail->city)){{$userDetail->city}} @endif{{old('city')}}">

            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
