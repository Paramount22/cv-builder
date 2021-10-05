<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="employer">Organizácia</label>
            <input class="form-control @error('employer') is-invalid
            @enderror" type="text" id="employer" name="employer"
           value="@if(isset($work->employer)){{$work->employer}} @endif{{old('employer')}}">
            @error('employer')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="job_title">
                Pracovná pozícia
            </label>
            <input class="form-control @error('job_title') is-invalid
            @enderror" type="text" id="job_title" name="job_title"
                   value="@if(isset($work->job_title)){{$work->job_title}} @endif{{old('job_title')}}">
            @error('job_title')
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
            <label for="start">Začiatok</label>
            <input type="date" id="start"
                   name="start"
                   value="@if(isset($work->start)){{$work->start}}@endif{{old('start')}}"
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
            <label for="end">Ukončenie</label>
            (<i>V prípade, že ste zamestnaný, dátum nevypĺnať</i>)
            <input type="date" id="end"
                   name="end"
                   value="@if(isset($work->end)){{$work->end}}@endif{{old('end')}}"
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
                   value="@if(isset($work->city)){{$work->city}} @endif{{old('city')}}">

            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="description">Popis činnosti <i> (nepovinný údaj)  </i></label>
            <textarea id="description" name="description" rows="4"
                placeholder="Krátko a výstižne popíšte vašu náplň práce" class="form-control
            @error('description') is-invalid @enderror">@if(isset($work->description)){{$work->description}} @endif{{old('description')}}</textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
