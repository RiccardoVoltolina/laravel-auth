@extends('layouts.admin')

@section('content')

<h1>Create</h1>

<div class="table-responsive mt-5">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">TITOLO</th>
                <th scope="col">DESCRIZIONE</th>
                <th scope="col">AUTORI</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td scope="row">{{$project->title}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->authors}}</td>
                </tr>

        </tbody>
    </table>
</div>

@endsection