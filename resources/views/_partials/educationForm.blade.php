<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="school_name">Názov školy</label>
            <input class="form-control @error('school_name') is-invalid
            @enderror" type="text" id="school_name" name="school_name"
           value="@if(isset($e->school_name)){{$e->school_name}} @endif{{old('school_name')}}">
            @error('school_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="field_of_study">
                Odbor alebo špecializácia <i> (nepovinný údaj)  </i>
            </label>
            <input class="form-control @error('field_of_study') is-invalid
            @enderror" type="text" id="field_of_study" name="field_of_study"
                   value="@if(isset($e->field_of_study)){{$e->field_of_study}} @endif{{old('field_of_study')}}">

            @error('field_of_study')
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
            <label for="start">Začiatok štúdia</label>
            <input type="date" id="start"
                   name="start"
                   value="@if(isset($e->start)){{$e->start}}@endif{{old('start')}}"
                   class="form-control @error('start') is-invalid
            @enderror">

            @error('start')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="end">Koniec štúdia</label>
            <input type="date" id="end"
                   name="end"
                   value="@if(isset($e->end)){{$e->end}}@endif{{old('end')}}"
                   class="form-control @error('end') is-invalid
            @enderror">

            @error('end')
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
            <label for="city">Mesto</label>
            <input class="form-control @error('city') is-invalid
            @enderror" type="text" id="city" name="city"
                   value="@if(isset($e->city)){{$e->city}} @endif{{old('city')}}">

            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="description">Popis štúdia <i> (nepovinný údaj)  </i></label>
            <textarea id="description" name="description" rows="2"
                placeholder="Krátko a výstižne popíšte vaše štúdium" class="form-control
            @error('description') is-invalid @enderror">@if(isset($e->description)){{$e->description}} @endif{{old('description')}}</textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
