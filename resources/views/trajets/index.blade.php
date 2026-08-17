<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Trajets disponibles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            {{-- Bonus : formulaire de filtrage --}}
            <div class="bg-white shadow-sm rounded-lg p-4 mb-6">
                <form method="GET" action="{{ route('trajets.index') }}" class="flex flex-wrap gap-4 items-end">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ville de départ</label>
                        <input type="text" name="ville_depart" value="{{ request('ville_depart') }}"
                            class="border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ville d'arrivée</label>
                        <input type="text" name="ville_arrivee" value="{{ request('ville_arrivee') }}"
                            class="border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" name="date_trajet" value="{{ request('date_trajet') }}"
                            class="border-gray-300 rounded-md shadow-sm">
                    </div>
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md">Filtrer</button>
                    <a href="{{ route('trajets.index') }}" class="text-gray-600 underline">Réinitialiser</a>
                </form>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse ($trajets as $trajet)
                    <div class="bg-white shadow-sm rounded-lg p-6">
                        <div class="flex gap-4 mb-4">
                            @if ($trajet->user->vehicule && $trajet->user->vehicule->photo)
                                <img src="{{ asset('storage/' . $trajet->user->vehicule->photo) }}"
                                    class="w-24 h-16 object-cover rounded-md">
                            @else
                                    <img src="{{ asset('images/default-vehicule.jpg') }}" alt="Pas de photo"
                                    class="w-24 h-16 object-cover rounded-md">
                            @endif
                            <div>
                                <p class="font-semibold">{{ $trajet->user->name }}</p>
                                <p class="text-sm text-gray-500">{{ $trajet->user->phone ?? '' }}</p>
                            </div>
                        </div>

                        <p class="mb-1"><span class="font-semibold">Départ :</span> {{ $trajet->ville_depart }} — {{ $trajet->description_depart }}</p>
                        <p class="mb-1"><span class="font-semibold">Arrivée :</span> {{ $trajet->ville_arrivee }} — {{ $trajet->description_arrivee }}</p>
                        <p class="mb-1"><span class="font-semibold">Date :</span> {{ \Carbon\Carbon::parse($trajet->date_trajet)->format('d/m/Y') }}</p>
                        <p class="mb-1"><span class="font-semibold">Places disponibles :</span> {{ $trajet->places_disponibles }}</p>
                    </div>
                @empty
                    <p>Aucun trajet disponible pour le moment.</p>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $trajets->links() }}
            </div>

        </div>
    </div>
</x-app-layout>