@extends('layouts.app')

@section('content')
    <section class="hobby">
        <div class="row justify-content-center mb-4">
            <div class="col-8">
                <h2 class="text-dark ">Záujmy alebo koníčky</h2>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('_partials.success')
                @if(isset($hobby))
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <p class="card-text text-dark w-75">{!! nl2br($hobby->text) !!}</p>

                            <span class="edit-links">
                                <a class="text-danger" href="" data-toggle="modal"
                                   data-target="#editHobbyModal-{{$hobby->id}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                 <a class="text-danger" href="" data-toggle="modal"
                                    data-target="#deleteHobbyModal-{{$hobby->id}}">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </span>
                            <!-- Modal -->
                            <div class="modal fade" id="editHobbyModal-{{$hobby->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel">Upraviť údaje</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('hobby.update', $hobby)}}" method="post">
                                                @csrf
                                                @method('put')
                                                @include('_partials.hobbyForm')
                                                <div class="form-group">
                                                    <button class="btn btn-primary">Uložiť zmeny</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal delete education -->
                            <div class="modal fade" id="deleteHobbyModal-{{$hobby->id}}" tabindex="-1"
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
                                            <form action="{{route('hobby.destroy', $hobby)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Vymazať</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        Momentálne neevidujeme žiadne záujmy alebo koníčky.
                    </div>
                    <span>
                        <a class="btn btn-sm btn-outline-dark" href="{{route('hobby.create')}}">Pridať</a>
                    </span>
                @endif
            </div>
        </div>
    </section>



@endsection
