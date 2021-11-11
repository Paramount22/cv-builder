@extends('layouts.app')

@section('content')

    <section class="language">

        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-white text-bold">Jazyky</h2>
                <span>
                    <a href="{{route('languages.create')}}">
                        <button class="btn btn-sm btn-outline-dark">
                          <i class="fas fa-plus mr-1"></i>  Pridať jazyk
                        </button>
                    </a>
                </span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('_partials.success')
                @forelse($languages as $language)
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title text-dark">{{$language->language}}</h4>

                                <span class="edit-links">
                                    <a class="text-danger" href="" data-toggle="modal"
                                       data-target="#editLanguage-{{$language->id}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                     <a class="text-danger" href="" data-toggle="modal"
                                        data-target="#deleteLanguage-{{$language->id}}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </span>
                            </div>

                            <p class="card-text">
                                {{$language->languageLevel->name}}
                            </p>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="editLanguage-{{$language->id}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalLabel">Upraviť údaje</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('languages.update', $language)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            @include('_partials.languageForm')
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark" for="level">Úroveň</label>
                                                    <select class="form-control @error('level') is-invalid @enderror" id="level"  name="level">
                                                        @foreach($levels as $level)
                                                            <option value="{{$level->id}}" @if($language->level_id == $level->id)
                                                            selected @endif>{{$level->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('level')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary">Uložiť zmeny</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal delete education -->
                    <div class="modal fade" id="deleteLanguage-{{$language->id}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalLabel">Si si istý ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Záznam bude vymazaný.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Zavrieť</button>
                                    <form action="{{route('languages.destroy', $language)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Vymazať</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning" role="alert">
                        Momentálne neevidujeme žiadne znalosti.
                    </div>
                @endforelse
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8 d-flex justify-content-end">
                @if(auth()->user()->hobby)
                    <a class="btn btn-outline-dark" href="{{route('hobby.index')}}">
                        Pokračovať na záujmy alebo koníčky
                    </a>
                @else
                    <a class="btn btn-outline-dark" href="{{route('hobby.create')}}">
                        Pokračovať na záujmy alebo koníčky
                    </a>
                @endif
            </div>
        </div>
    </section>
@endsection
