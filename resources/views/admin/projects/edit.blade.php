@extends('layouts.app')

@section("content")
    <div class="container edit-container mt-5">
        <div class="row">
            <div class="col text-dark">
                <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" enctype="multipart/form-data">
                    @csrf()
                    @method("put")
                    
                    {{-- TITOLO --}}
        
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control @error("title") is-invalid                            
                        @enderror" value="{{old("title", $project->title)}}">

                        {{-- ALLERT --}}
                        @error("title")
                            <div class="invalid-feedback">You need to give it a title</div>
                        @enderror
                    </div>

                    {{-- TIPOLOGIA PROGETTO --}}

                    <div class="mb-3">
                        <label for="type_id" class="form-label">Type</label>
                        <select name="type_id" class="form-select @error('type_id') is-invalid                           
                        @enderror" id="type_id">
                            {{-- ciclo per avere tutte le option --}}
                            @foreach($types as $type)
                                <option value="{{$type->id}}" {{$project->type_id === $type->id ? "selected" : ""}}>{{$type->type}}</option>                                               
                            @endforeach
                        </select>
                    </div>
                    
                    {{-- LINGUAGGIO PROGRAMMAZIONE --}}

                    <div class="mb-3">
                        <label class="form-label mb-3">Technologies</label>

                        <div class="">
                            @foreach ($technologies as $specificTechnology)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="{{$specificTechnology->id}}" {{$project->technologies?->contains($specificTechnology->id) ? "checked" : ""}} id="flexCheckDefault" name="technologies[]">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$specificTechnology->name}}
                                </label>                            
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- LINK PROGETTO --}}

                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" id="link" name="link" class="form-control @error("link") is-invalid                            
                        @enderror" value="{{old("title", $project->link)}}">
                        {{-- ALLERT --}}
                        @error("link")
                            <div class="invalid-feedback">Enter the link to view the project</div>
                        @enderror
                    </div>

                    {{-- DESCRIZIONE --}}

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea  id="description" name="description" class="form-control @error("description") is-invalid                            
                        @enderror">{{old("description", $project->description)}}</textarea>
                        {{-- ALLERT --}}
                        @error("description")
                            <div class="invalid-feedback">You must enter a description</div>
                        @enderror
                    </div>

                    {{-- IMMAGINE --}}

                    <div class="mb-3">
                        <label for="thumb" class="form-label">Image</label>
                        <input type="file" accept="image/* " id="thumb" name="thumb" class="form-control @error("thumb") is-invalid                            
                        @enderror">
                        {{-- ALLERT --}}
                        @error("thumb")
                            <div class="invalid-feedback">You need to upload an image</div>
                        @enderror
                    </div>

                    {{-- DATA --}}

                    <div class="mb-3">
                        <label for="date" class="form-label">Release</label>
                        <input type="date" id="date" name="release"  class="form-control @error("release") is-invalid                            
                        @enderror" value="{{old("release", $project->release->format("Y-m-d"))}}">
                        {{-- ALLERT --}}
                        @error("release")
                            <div class="invalid-feedback">You need to set the date</div>
                        @enderror
                    </div>

                    {{-- CONFIRM BUTTON --}}

                    <button type="submit" class="btn btn-primary mt-4">CONFIRM</button>

                </form>
            </div>
        </div>
    </div>

@endsection