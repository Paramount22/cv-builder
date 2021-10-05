<div class="col-md-8">
    <div class="form-group">
        <label for="name">Znalosť</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
           value="@if(isset($skill->name)){{$skill->name}} @endif{{old('name')}}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
