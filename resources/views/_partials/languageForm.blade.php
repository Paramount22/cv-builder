<div class="col-md-8">
    <div class="form-group">
        <label for="language">Jazyk</label>
        <input class="form-control @error('language') is-invalid @enderror" type="text" id="language"
               name="language"
           value="@if(isset($language->language)){{$language->language}} @endif{{old('language')}}">
        @error('language')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
