<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    // Liste publique des trajets (accessible à tous)
    public function index(Request $request)
    {
        $query = Trajet::with(['user', 'user.vehicule'])->latest();

        // Bonus : filtrage
        if ($request->filled('ville_depart')) {
            $query->where('ville_depart', 'like', '%' . $request->ville_depart . '%');
        }
        if ($request->filled('ville_arrivee')) {
            $query->where('ville_arrivee', 'like', '%' . $request->ville_arrivee . '%');
        }
        if ($request->filled('date_trajet')) {
            $query->whereDate('date_trajet', $request->date_trajet);
        }

        // Bonus : pagination
        $trajets = $query->paginate(6)->withQueryString();

        return view('trajets.index', compact('trajets'));
    }

    // Formulaire de création
    public function create()
    {
        // Le véhicule doit être enregistré avant de créer un trajet
        if (!auth()->user()->vehicule) {
            return redirect()->route('vehicule.create')
                ->with('error', 'Tu dois enregistrer ton véhicule avant de proposer un trajet.');
        }

        return view('trajets.create');
    }

    // Enregistrer le trajet
    public function store(Request $request)
    {
        if (!auth()->user()->vehicule) {
            return redirect()->route('vehicule.create');
        }

        $validated = $request->validate([
            'ville_depart' => 'required|string|max:255',
            'description_depart' => 'required|string|max:500',
            'ville_arrivee' => 'required|string|max:255',
            'description_arrivee' => 'required|string|max:500',
            'date_trajet' => 'required|date|after_or_equal:today',
            'places_disponibles' => 'required|integer|min:1|max:20',
        ]);

        auth()->user()->trajets()->create($validated);

        return redirect()->route('trajets.mine')->with('success', 'Trajet créé avec succès.');
    }

    // Liste des trajets de l'utilisateur connecté
    public function mine()
    {
        $trajets = auth()->user()->trajets()->latest()->get();

        return view('trajets.mine', compact('trajets'));
    }

    // Supprimer un trajet (uniquement le sien)
    public function destroy(Trajet $trajet)
    {
        // Sécurité : seul le propriétaire peut supprimer
        if ($trajet->user_id !== auth()->id()) {
            abort(403);
        }

        $trajet->delete();

        return redirect()->route('trajets.mine')->with('success', 'Trajet supprimé.');
    }
}