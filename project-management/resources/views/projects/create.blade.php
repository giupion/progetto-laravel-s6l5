<!-- resources/views/projects/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Crea un nuovo progetto</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titolo del progetto">
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descrizione del progetto"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
