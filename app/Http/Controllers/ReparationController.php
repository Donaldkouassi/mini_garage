<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    /**
     * Afficher la liste des réparations.
     */
    public function index()
    {
        $reparations = Reparation::with(['vehicule', 'techniciens'])->get();

        return response()->json($reparations);
    }

    /**
     * Enregistrer une nouvelle réparation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'date' => 'required|date',
            'duree_main_oeuvre' => 'required|integer|min:1',
            'objet_reparation' => 'required|string',
            'techniciens' => 'nullable|array',
            'techniciens.*' => 'exists:techniciens,id',
        ]);

        $reparation = Reparation::create([
            'vehicule_id' => $validated['vehicule_id'],
            'date' => $validated['date'],
            'duree_main_oeuvre' => $validated['duree_main_oeuvre'],
            'objet_reparation' => $validated['objet_reparation'],
        ]);

        if (!empty($validated['techniciens'])) {
            $reparation->techniciens()->attach($validated['techniciens']);
        }

        return response()->json(
            $reparation->load(['vehicule', 'techniciens']),
            201
        );
    }

    /**
     * Afficher une réparation précise.
     */
    public function show(Reparation $reparation)
    {
        return response()->json(
            $reparation->load(['vehicule', 'techniciens'])
        );
    }

    /**
     * Modifier une réparation.
     */
    public function update(Request $request, Reparation $reparation)
    {
        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'date' => 'required|date',
            'duree_main_oeuvre' => 'required|integer|min:1',
            'objet_reparation' => 'required|string',
            'techniciens' => 'nullable|array',
            'techniciens.*' => 'exists:techniciens,id',
        ]);

        $reparation->update([
            'vehicule_id' => $validated['vehicule_id'],
            'date' => $validated['date'],
            'duree_main_oeuvre' => $validated['duree_main_oeuvre'],
            'objet_reparation' => $validated['objet_reparation'],
        ]);

        $reparation->techniciens()->sync($validated['techniciens'] ?? []);

        return response()->json(
            $reparation->load(['vehicule', 'techniciens'])
        );
    }

    /**
     * Supprimer une réparation.
     */
    public function destroy(Reparation $reparation)
    {
        $reparation->techniciens()->detach();

        $reparation->delete();

        return response()->json([
            'message' => 'Réparation supprimée avec succès.'
        ]);
    }
}