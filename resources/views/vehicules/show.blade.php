<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mon véhicule
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($vehicule)
                    <div class="flex flex-col items-start gap-4">
                        @if ($vehicule->photo)
                            <img src="{{ asset('storage/' . $vehicule->photo) }}" alt="Véhicule"
                                class="w-64 h-40 object-cover rounded-md">
                        @else
                            <img src="{{ asset('images/default-vehicule.jpg') }}" alt="Pas de photo"
                                class="w-64 h-40 object-cover rounded-md">
                        @endif

                        <p><span class="font-semibold">Numéro de plaque :</span> {{ $vehicule->numero_plaque }}</p>
                        <p><span class="font-semibold">Description :</span> {{ $vehicule->description }}</p>
                    </div>
                @else
                    <p class="mb-4">Tu n'as pas encore enregistré de véhicule. Tu dois en enregistrer un avant de pouvoir proposer un trajet.</p>
                    <a href="{{ route('vehicule.create') }}" class="bg-gray-800 text-white px-4 py-2 rounded-md">
                        Enregistrer mon véhicule
                    </a>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>