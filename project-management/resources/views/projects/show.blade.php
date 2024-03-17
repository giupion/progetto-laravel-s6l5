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
                    <p class="text-white"><strong>Titolo:</strong> {{ $project->title }}</p>
                    <p class="text-white"><strong>Descrizione:</strong> {{ $project->description }}</p>
                    <h3 class="text-white"><strong>Linguaggi Usati:</strong> {{ $project->language_used }}</h3>
                    <p class="text-white"><strong>Data Inizio: </strong>{{ $project->start_date }}</p>
                    <p class="text-white"><strong>Scadenza: </strong>{{ $project->expire_date }}</p>

                    <!-- Creazione di un'attività -->
                    <h3 class="text-lg font-semibold mb-4 text-white">Crea Nuova Attività</h3>
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">
                        <div class="mb-3">
                            <label for="title" class="block text-white">Titolo</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="block text-white">Descrizione</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary text-white">Crea Attività</button>
                    </form>

                    <!-- Visualizzazione delle attività del progetto -->
                    <h3 class="text-lg font-semibold mb-4 text-white">Attività del Progetto</h3>
                    <ul class="list-disc text-white">
                        @foreach($project->tasks as $task)
                            <li>
                                {{ $task->title }}
                                <!-- Bottoni Modifica ed Elimina attività -->
                                

                                <a href="{{ route('tasks.edit', ['project' => $project->id, 'task' => $task->id]) }}" class="btn btn-primary text-white"><strong>Modifica</strong></a>
                                <form action="{{ route('tasks.destroy', ['project' => $project->id, 'task' => $task->id]) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-white" onclick="return confirm('Sei sicuro di voler eliminare questa attività?')"><strong>Elimina</strong></button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
