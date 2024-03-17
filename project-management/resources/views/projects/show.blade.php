<!-- resources/views/projects/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dettagli Progetto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <!-- Visualizzazione dei dettagli del progetto -->
                    <h3 class="text-lg font-semibold mb-4 text-white">Dettagli del Progetto</h3>
                    <div class="text-white">
                        <p><strong>Titolo:</strong> {{ $project->title }}</p>
                        <p><strong>Descrizione:</strong> {{ $project->description }}</p>
                        <p><strong>Linguaggi Usati:</strong> {{ $project->language_used }}</p>
                        <p><strong>Data Inizio:</strong> {{ $project->start_date }}</p>
                        <p><strong>Scadenza:</strong> {{ $project->expire_date }}</p>
                    </div>

                    <!-- Pulsanti per modificare ed eliminare il progetto -->
                    <div class="flex mt-6">
                        <a class="text-white" href="{{ route('projects.edit', $project) }}" class="btn btn-primary mr-2">Modifica Progetto</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger text-white">Elimina Progetto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form per creare una nuova attività -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <h3 class="text-lg font-semibold mb-4 text-white">Nuova Attività</h3>
                    <form action="{{ route('tasks.store', $project->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titolo</label>
                            <input type="text" name="title" id="title" class="form-input mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrizione</label>
                            <textarea name="description" id="description" rows="3" class="form-textarea mt-1 block w-full"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary text-white">Crea Attività</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Visualizzazione delle attività associate al progetto -->
    <<!-- Visualizzazione delle attività associate al progetto -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <h3 class="text-lg font-semibold mb-4 text-white">Attività del Progetto</h3>
                <ul class="list-disc text-white">
                    @foreach($project->tasks as $task)
                        <div class="flex items-center justify-between">
                            <p>{{ $task->title }}</p>
                            <div class="flex space-x-2">
                                <a href="{{ route('tasks.edit', ['project' => $project->id, 'task' => $task->id]) }}" class="btn btn-primary">Modifica</a>
                                <form action="{{ route('tasks.destroy', ['project' => $project->id, 'task' => $task->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
