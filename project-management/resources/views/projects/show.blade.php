<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $project->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <p class="text-white">{{ $project->description }}</p>
                    <p class="text-white">Linguaggi usati: 
                        @if (is_array($project->languages_used))
                            {{ implode(', ', $project->languages_used) }}
                        @else
                            {{ $project->languages_used }}
                        @endif
                    </p>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary text-white">Modifica</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <h1 class="text-white"><button type="submit" class="btn btn-danger">Elimina</button></h1>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

