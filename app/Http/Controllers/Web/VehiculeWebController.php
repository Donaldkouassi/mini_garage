<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeWebController extends Controller
{
    /**
     * Afficher la liste des véhicules avec recherche.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $recherche = $search;

        $vehicules = Vehicule::withCount('reparations')
            ->when($search, function ($query) use ($search) {
                $query->where('marque', 'like', "%{$search}%")
                      ->orWhere('modele', 'like', "%{$search}%")
                      ->orWhere('immatriculation', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('garage.vehicules.index', compact('vehicules', 'search', 'recherche'));
    }

    /**
     * Afficher le formulaire d’ajout d’un véhicule.
     */
    public function create()
    {
        return view('garage.vehicules.create');
    }

    /**
     * Enregistrer un nouveau véhicule.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'immatriculation' => 'required|string|max:255|unique:vehicules,immatriculation',
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
            'annee' => 'required|integer|min:1900|max:2100',
            'kilometrage' => 'required|integer|min:0',
            'carrosserie' => 'required|string|max:255',
            'energie' => 'required|string|max:255',
            'boite' => 'required|string|max:255',
        ]);

        Vehicule::create($validated);

        return redirect()
            ->route('garage.vehicules.index')
            ->with('success', 'Véhicule ajouté avec succès.');
    }

    /**
     * Afficher le détail d’un véhicule.
     */
    public function show(Vehicule $vehicule)
    {
        $vehicule->load('reparations.techniciens');

        return view('garage.vehicules.show', compact('vehicule'));
    }

    /**
     * Afficher le formulaire de modification d’un véhicule.
     */
    public function edit(Vehicule $vehicule)
    {
        return view('garage.vehicules.edit', compact('vehicule'));
    }

    /**
     * Modifier un véhicule.
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        $validated = $request->validate([
            'immatriculation' => 'required|string|max:255|unique:vehicules,immatriculation,' . $vehicule->id,
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
            'annee' => 'required|integer|min:1900|max:2100',
            'kilometrage' => 'required|integer|min:0',
            'carrosserie' => 'required|string|max:255',
            'energie' => 'required|string|max:255',
            'boite' => 'required|string|max:255',
        ]);

        $vehicule->update($validated);

        return redirect()
            ->route('garage.vehicules.index')
            ->with('success', 'Véhicule modifié avec succès.');
    }

    /**
     * Supprimer un véhicule.
     */
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return redirect()
            ->route('garage.vehicules.index')
            ->with('success', 'Véhicule supprimé avec succès.');
    }
}