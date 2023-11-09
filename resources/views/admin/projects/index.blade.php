
@extends('layouts.admin')

@section('content')

@if(session('messaggio'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>Congratulazioni!</strong> {{session('messaggio')}}
</div>

@endif

<div class="table-responsive mt-5">

    <h1>Dashboard</h1>



    {{-- impaginazione eseguita tramite la funzione index situata nel ProjectController --}}

    {{$projects->links('pagination::bootstrap-5')}}

    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">IMMAGINI</th>
                <th scope="col">TITOLO</th>
                <th scope="col">DESCRIZIONE</th>
                <th scope="col">AUTORI</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)

            <img src="{{asset('storage/' . $project->projects_images)}}" alt="">
           
                <tr>
                    <td><img class="w-25" src="{{ Str::startsWith($project->thumb, 'placeholders/') ? asset('storage/' .  $project->thumb) :  $project->thumb }}" alt=""></td>
                    <td scope="row">{{$project->title}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->authors}}</td>
                    <td class="d-flex">


                     

                        <form action="{{route("project.show", [$project->id])}}">
                           
                            <button class="bg-success mb-3 border-0" type="submit">Dettagli</button>
                        </form>

                        <form class="mx-2" action="{{route("project.edit", [$project->id])}}">
                           
                            <button class="bg-success mb-3 border-0" type="submit">Aggiorna</button>
                        </form>

                        <form action="{{route("project.destroy", [$project->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-danger mb-3 border-0" type="submit">Cancella</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <form class="mx-2" action="{{route("project.create")}}">
                           
        <button class="bg-success mb-3 border-0" type="submit">Aggiungi un nuovo progetto</button>
    </form>
</div>

@endsection
