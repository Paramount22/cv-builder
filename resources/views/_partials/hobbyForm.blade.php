<div class="col-12">
    <div class="form-group">
        <label for="hobby"></label>
            <textarea id="hobby" name="text" rows="6"
              placeholder="Vo voľnom čase rada bicyklujem, čítam literatúru faktu a rozširujem si vedomosti v oblasti somelierstva" class="form-control
            @error('text') is-invalid @enderror">@if(isset($hobby->text)){{$hobby->text}} @endif{{old('text')
            }}</textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

</div>
