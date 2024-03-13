@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Progetto</h1>
        <form action="{{ route('projects.update', $project->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Titolo:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}">
            </div>
            <div class="form-group">
                <label for="description">Descrizione:</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ $project->description }}</textarea>
            </div>
            <!-- Altri campi del progetto se necessario -->
            <button type="submit" class="btn btn-primary">Aggiorna Progetto</button>
        </form>
    </div>
@endsection