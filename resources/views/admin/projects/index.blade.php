
@extends('layouts.admin')

@section('content')


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
            @foreach ($projects as $project)
                <tr>
                    <td scope="row">{{$project->title}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->authors}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
