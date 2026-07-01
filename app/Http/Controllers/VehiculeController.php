<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        return response()->json(Vehicule::all());
    }

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

        $vehicule = Vehicule::create($validated);

        return response()->json($vehicule, 201);
    }

    public function show(Vehicule $vehicule)
    {
        return response()->json($vehicule);
    }

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

        return response()->json($vehicule);
    }

    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return response()->json([
            'message' => 'Véhicule supprimé avec succès.'
        ]);
    }
}