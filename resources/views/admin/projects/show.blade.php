@extends('layouts.admin')

@section('content')

<h1 class="text-center my-3">PROGETTO</h1>


<div class="table-responsive mt-5">
    <table class="table table-primary">
        <thead>
            <tr>
                <th class="text-center" scope="col">IMMAGINI</th>
                <th class="text-center" scope="col">TITOLO</th>
                <th class="text-center" scope="col">DESCRIZIONE</th>
                <th class="text-center" scope="col">AUTORI</th>
                <th class="text-center" scope="col">LINK GITHUB</th>
                <th class="text-center" scope="col">LINK AL PROGETTO</th>

            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>
                        <img width="100" src="{{ asset('storage/' . $project->thumb) }}">
                    </td>
                    <td scope="row">{{$project->title}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->authors}}</td>
                    <td class="text-center"><a href="{{$project->githublink}}"><i class="fa-brands fa-github text-black"></i></a></td>
                    <td class="text-center"><a href="{{$project->projectlink}}"><i class="fa-solid fa-diagram-project text-black"></i></a></td>
                </tr>

        </tbody>
    </table>
</div>
<a class="nav-link my-2 text-end" href="{{route('project.index')}}">
    <button type="button" class="btn btn-primary">TORNA AI PROGETTI</button>
</a>

@endsection