<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mes trajets
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
            @endif

            <a href="{{ route('trajets.create') }}" class="inline-block mb-6 bg-gray-800 text-white px-4 py-2 rounded-md">
                + Proposer un trajet
            </a>

            <div class="grid grid-cols-1 gap-4">
                @forelse ($trajets as $trajet)
                    <div class="bg-white shadow-sm rounded-lg p-6 flex justify-between items-start">
                        <div>
                            <p class="mb-1"><span class="font-semibold">Départ :</span> {{ $trajet->ville_depart }} — {{ $trajet->description_depart }}</p>
                            <p class="mb-1"><span class="font-semibold">Arrivée :</span> {{ $trajet->ville_arrivee }} — {{ $trajet->description_arrivee }}</p>
                            <p class="mb-1"><span class="font-semibold">Date :</span> {{ \Carbon\Carbon::parse($trajet->date_trajet)->format('d/m/Y') }}</p>
                            <p class="mb-1"><span class="font-semibold">Places disponibles :</span> {{ $trajet->places_disponibles }}</p>
                        </div>

                        <form method="POST" action="{{ route('trajets.destroy', $trajet) }}"
                            onsubmit="return confirm('Supprimer ce trajet ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </div>
                @empty
                    <p>Tu n'as encore proposé aucun trajet.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>