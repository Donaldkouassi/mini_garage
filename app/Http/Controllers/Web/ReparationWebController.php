<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Reparation;
use App\Models\Technicien;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class ReparationWebController extends Controller
{
    /**
     * Afficher la liste des réparations.
     */
    public function index()
    {
        $reparations = Reparation::with(['vehicule', 'techniciens'])
            ->orderBy('date', 'desc')
            ->paginate(9);

        return view('garage.reparations.index', compact('reparations'));
    }

    /**
     * Afficher le formulaire d'ajout d'une réparation.
     */
    public function create()
    {
        $vehicules = Vehicule::orderBy('marque')->get();
        $techniciens = Technicien::orderBy('nom')->get();

        return view('garage.reparations.create', compact('vehicules', 'techniciens'));
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
            'techniciens' => 'required|array',
            'techniciens.*' => 'exists:techniciens,id',
        ]);

        $reparation = Reparation::create([
            'vehicule_id' => $validated['vehicule_id'],
            'date' => $validated['date'],
            'duree_main_oeuvre' => $validated['duree_main_oeuvre'],
            'objet_reparation' => $validated['objet_reparation'],
        ]);

        $reparation->techniciens()->attach($validated['techniciens']);

        return redirect()
            ->route('garage.reparations.index')
            ->with('success', 'Réparation ajoutée avec succès.');
    }

    /**
     * Afficher le formulaire de modification d'une réparation.
     */
    public function edit(Reparation $reparation)
    {
        $vehicules = Vehicule::orderBy('marque')->get();
        $techniciens = Technicien::orderBy('nom')->get();

        $reparation->load('techniciens');

        return view('garage.reparations.edit', compact('reparation', 'vehicules', 'techniciens'));
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
            'techniciens' => 'required|array',
            'techniciens.*' => 'exists:techniciens,id',
        ]);

        $reparation->update([
            'vehicule_id' => $validated['vehicule_id'],
            'date' => $validated['date'],
            'duree_main_oeuvre' => $validated['duree_main_oeuvre'],
            'objet_reparation' => $validated['objet_reparation'],
        ]);

        $reparation->techniciens()->sync($validated['techniciens']);

        return redirect()
            ->route('garage.reparations.index')
            ->with('success', 'Réparation modifiée avec succès.');
    }

    /**
     * Supprimer une réparation.
     */
    public function destroy(Reparation $reparation)
    {
        $reparation->techniciens()->detach();
        $reparation->delete();

        return redirect()
            ->route('garage.reparations.index')
            ->with('success', 'Réparation supprimée avec succès.');
    }
}