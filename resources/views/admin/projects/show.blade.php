@extends('layouts.admin')

@section('content')

<h1 class="text-center my-3">PROGETTO</h1>


<div class="table-responsive mt-5">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">IMMAGINI</th>
                <th scope="col">TITOLO</th>
                <th scope="col">DESCRIZIONE</th>
                <th scope="col">AUTORI</th>
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
                </tr>

        </tbody>
    </table>
</div>

@endsection