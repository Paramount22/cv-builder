@extends('layouts.app')

@section('content')

    <section class="education">

        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-white text-bold">Kurz alebo certifikát</h2>
                <span>
                    <a href="{{route('courses.create')}}">
                        <button class="btn btn-sm btn-outline-dark">
                          <i class="fas fa-plus mr-1"></i>  Pridať kurz
                        </button>
                    </a>
                </span>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('_partials.success')
                @forelse($courses as $course)
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title text-dark">{{$course->title}}</h4>

                                <span class="edit-links">
                                <a class="text-danger" href="" data-toggle="modal"
                                   data-target="#editCourse-{{$course->id}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                 <a class="text-danger" href="" data-toggle="modal"
                                    data-target="#deleteCourse-{{$course->id}}">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </span>
                            </div>

                            <p class="card-text">
                                {{$course->institution}}
                            </p>

                            <p class="card-text">
                                {{$course->FullFormatDate}}
                            </p>

                            @if($course->description)
                                <p class="card-text">
                                    {!! nl2br($course->description) !!}
                                </p>
                            @endif

                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="editCourse-{{$course->id}}" tabindex="-1"
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
                                    <form action="{{route('courses.update', $course)}}" method="post">
                                        @csrf
                                        @method('put')
                                        @include('_partials.coursesForm')
                                        <button class="btn btn-primary">Uložiť zmeny</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal delete education -->
                    <div class="modal fade" id="deleteCourse-{{$course->id}}" tabindex="-1"
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
                                    <form action="{{route('courses.destroy', $course)}}" method="post">
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
                        Momentálne neevidujeme žiadne kurzy, školenia alebo certifikáty.
                    </div>

                @endforelse
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-8 d-flex justify-content-end">
                @if(auth()->user()->skills->count())
                    <a class="btn btn-outline-dark" href="{{route('skills.index')}}">
                        Pokračovať na znalosti
                    </a>
                @else
                    <a class="btn btn-outline-dark" href="{{route('skills.create')}}">
                        Pokračovať na znalosti
                    </a>
                @endif
            </div>
        </div>

    </section>
@endsection
