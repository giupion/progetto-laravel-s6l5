<!-- resources/views/projects/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card mt-4">
        <div class="card-body">
            <h1>{{ $project->title }}</h1>
            <p class="card-text">{{ $project->description }}</p>
            <p class="card-text">Linguaggi usati: 
                @if (is_array($project->languages_used))
                    {{ implode(', ', $project->languages_used) }}
                @else
                    {{ $project->languages_used }}
                @endif
            </p>
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Modifica</a>
        </div>
    </div>
@endsection
