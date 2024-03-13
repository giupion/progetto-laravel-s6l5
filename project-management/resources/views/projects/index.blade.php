<!-- resources/views/projects/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Elenco Progetti</h1>
    <ul class="list-group">
        @foreach($projects as $project)
            <li class="list-group-item">
                <a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
