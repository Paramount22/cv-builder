<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="title">Názov kurzu/školenia alebo certifikátu</label>
            <input class="form-control @error('title') is-invalid
            @enderror" type="text" id="title" name="title"
                   value="@if(isset($course->title)){{$course->title}} @endif{{old('title')}}">
            @error('title')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="institution">Názov inštitúcie</label>
            <input class="form-control @error('institution') is-invalid
            @enderror" type="text" id="institution" name="institution"
           value="@if(isset($course->institution)){{$course->institution}} @endif{{old('institution')}}">
            @error('institution')
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
                   value="@if(isset($course->start)){{$course->start}}@endif{{old('start')}}"
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
            <label for="end">Koniec</label>
            <input type="date" id="end"
                   name="end"
                   value="@if(isset($course->end)){{$course->end}}@endif{{old('end')}}"
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
            <label for="description">Popis</label>
            <small><i>(nepovinné)</i></small>
            <textarea id="description" name="description" rows="4"
                placeholder="Krátko a výstižne popíšte ďalšie informácie" class="form-control
            @error('description') is-invalid @enderror">@if(isset($course->description)){{$course->description}} @endif{{old('description')}}</textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
