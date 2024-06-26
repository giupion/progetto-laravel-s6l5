<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crea un nuovo progetto') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <form action="{{ route('projects.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Titolo</label>
                            <input type="text" name="title" id="title" class="form-input mt-1 block w-full" placeholder="Titolo del progetto">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrizione</label>
                            <textarea name="description" id="description" rows="3" class="form-textarea mt-1 block w-full" placeholder="Descrizione del progetto"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="language_used" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Linguaggi Usati</label>
                            <input type="text" name="language_used" id="language_used" class="form-input mt-1 block w-full" placeholder="Linguaggi utilizzati">
                        </div>
                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data Inizio</label>
                            <input type="date" name="start_date" id="start_date" class="form-input mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="expire_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Scadenza</label>
                            <input type="date" name="expire_date" id="expire_date" class="form-input mt-1 block w-full">
                        </div>
                        <button type="submit" class="btn btn-primary text-white">Salva</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
