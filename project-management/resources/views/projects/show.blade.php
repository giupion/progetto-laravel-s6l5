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

                    <!-- Bottoni Modifica ed Elimina progetto -->
                    <div class="mt-4">
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary text-white">Modifica</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
