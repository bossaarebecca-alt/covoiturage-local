<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Enregistrer mon véhicule
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

                <form method="POST" action="{{ route('vehicule.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Photo du véhicule</label>
                        <input type="file" name="photo" accept="image/*" class="block w-full">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Numéro de plaque</label>
                        <input type="text" name="numero_plaque" value="{{ old('numero_plaque') }}"
                            class="border-gray-300 rounded-md shadow-sm w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">Description (modèle, couleur, particularités...)</label>
                        <textarea name="description" rows="4"
                            class="border-gray-300 rounded-md shadow-sm w-full" required>{{ old('description') }}</textarea>
                    </div>

                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md">
                        Enregistrer
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>