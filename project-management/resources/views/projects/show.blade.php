<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <!-- Contenuto della dashboard -->
                    <a href="{{ route('projects.create') }}" class="text-white ">CREA NUOVO PROGETTO!</a>
                    <h3><a href="{{ route('projects.index') }}" class="text-white ">I MIEI PROGETTI!</a></h3>
                    <h3 class="text-lg font-semibold mb-4 text-white">Elenco Progetti</h3>
                    <ul class="list-disc text-white">
                        @foreach($projects as $project)
                            <li>{{ $project->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>