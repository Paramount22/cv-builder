@extends('layouts.app')

@section('content')

    <section class="works">

        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-between align-items-center mb-4">
                <h2 class=" text-dark">Pracovné skúsenosti</h2>
                <span>
                    <a href="{{route('works.create')}}">
                        <button class="btn btn-sm btn-outline-dark">
                          <i class="fas fa-plus mr-1"></i>  Pridať pracovnú skúsenosť
                        </button>
                    </a>
                </span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('_partials.success')
                @forelse($works as $work)
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title text-dark">{{$work->employer}}</h4>

                                <span class="edit-links">
                                <a class="text-danger" href="" data-toggle="modal"
                                   data-target="#editWork-{{$work->id}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                 <a class="text-danger" href="" data-toggle="modal"
                                    data-target="#deleteWork-{{$work->id}}">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </span>
                            </div>

                            <p class="card-text">
                               {{$work->job_title}}
                            </p>

                            <p class="card-text">
                                {{$work->StartFormatDate}} -

                                @if($work->EndFormatDate == 1970)
                                    Súčastnosť,
                                @else
                                    {{$work->EndFormatDate}},
                                @endif
                                {{$work->city}}
                            </p>

                            @if($work->description)
                                <p class="card-text">
                                    {!! nl2br($work->description) !!}
                                </p>
                            @endif

                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="editWork-{{$work->id}}" tabindex="-1"
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
                                    <form action="{{route('works.update', $work)}}" method="post">
                                        @csrf
                                        @method('put')
                                        @include('_partials.worksForm')
                                        <button class="btn btn-primary">Uložiť zmeny</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal delete education -->
                    <div class="modal fade" id="deleteWork-{{$work->id}}" tabindex="-1"
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
                                    Záznan bude vymazaný.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="{{route('works.destroy', $work)}}" method="post">
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
                        Momentálne neevidujeme žiadne pracovné skúsenosti.
                    </div>

                @endforelse
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-8 d-flex justify-content-end">
                @if(auth()->user()->courses->count())
                    <a class="btn btn-outline-dark" href="{{route('courses.index')}}">
                        Pokračovať na kurzy a certifikáty
                    </a>
                @else
                    <a class="btn btn-outline-dark" href="{{route('courses.create')}}">
                        Pokračovať na kurzy a certifikáty
                    </a>
                @endif
            </div>
        </div>

    </section>
@endsection
