<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehiculeController extends Controller
{
    // Afficher le véhicule de l'utilisateur connecté (ou le formulaire de création s'il n'en a pas)
    public function show()
    {
        $vehicule = auth()->user()->vehicule;

        return view('vehicules.show', compact('vehicule'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        // Un utilisateur ne peut avoir qu'un seul véhicule
        if (auth()->user()->vehicule) {
            return redirect()->route('vehicule.show');
        }

        return view('vehicules.create');
    }

    // Enregistrer le véhicule
    public function store(Request $request)
    {
        // Sécurité : un utilisateur ne peut créer qu'un seul véhicule
        if (auth()->user()->vehicule) {
            return redirect()->route('vehicule.show');
        }

        $validated = $request->validate([
            'photo' => 'nullable|image|max:2048',
            'numero_plaque' => 'required|string|max:20',
            'description' => 'required|string|max:500',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('vehicules', 'public');
        }

        auth()->user()->vehicule()->create($validated);

        return redirect()->route('vehicule.show')->with('success', 'Véhicule enregistré avec succès.');
    }
}