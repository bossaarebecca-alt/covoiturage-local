<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Proposer un trajet
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('trajets.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Ville de départ</label>
                        <input type="text" name="ville_depart" value="{{ old('ville_depart') }}"
                            class="border-gray-300 rounded-md shadow-sm w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Description du lieu de départ</label>
                        <textarea name="description_depart" rows="2"
                            class="border-gray-300 rounded-md shadow-sm w-full" required>{{ old('description_depart') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Ville d'arrivée</label>
                        <input type="text" name="ville_arrivee" value="{{ old('ville_arrivee') }}"
                            class="border-gray-300 rounded-md shadow-sm w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Description du lieu d'arrivée</label>
                        <textarea name="description_arrivee" rows="2"
                            class="border-gray-300 rounded-md shadow-sm w-full" required>{{ old('description_arrivee') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Date du trajet</label>
                        <input type="date" name="date_trajet" value="{{ old('date_trajet') }}"
                            class="border-gray-300 rounded-md shadow-sm w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Places disponibles</label>
                        <input type="number" name="places_disponibles" min="1" max="20" value="{{ old('places_disponibles') }}"
                            class="border-gray-300 rounded-md shadow-sm w-full" required>
                    </div>

                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md">
                        Publier le trajet
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>