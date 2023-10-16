@extends('layouts.app')

@section("content")
    <div class="container text-dark pb-5">
        <div class="row">
            <div class="col show-col">
                <div class="show-box d-flex flex-column gap-2">
                    <h1 class="display-4">{{$project->title}}</h1>

                    {{-- Immagine --}}
                    <img src="{{asset("storage/" . $project->thumb)}}" alt="" class="">

                    {{-- Tipologia progetto --}}
                    <p>Type: {{$project->type->type ?? ""}}</p>

                    {{-- Linguaggio Programmazione --}}
                    <div class="badges-container">
                        @foreach($project->technologies as $specificProject)
                            <p class="badge text-dark" style="background-color: rgb({{$specificProject->color}})"> {{$specificProject->name}}</p>            
                        @endforeach
                    </div>


                    {{-- Descrizione --}}
                    <p class="mt-2">{{$project->description}}</p>

                    {{-- Collegamento a GitHub --}}
                    <a href="{{$project->link}}" class="fs-5 text-decoration-none">GitHub</a>

                    {{-- Data di pubblicazione --}}
                    <p>Release: {{$project->release->format("d-m-Y")}}</p>

                </div>

                {{-- BOTTONI --}}

                <div class="Btn-container d-flex gap-4 mt-3">
                    <a href="{{route("admin.projects.edit", $project->id)}}" class="btn btn-primary btn-lg mt-2" type="button">EDIT</a>
                    <form action="{{route("admin.projects.destroy", $project->slug)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-primary btn-lg mt-2" type="submit"> DELETE </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection