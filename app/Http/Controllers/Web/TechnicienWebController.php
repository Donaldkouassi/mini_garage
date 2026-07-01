<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Technicien;
use Illuminate\Http\Request;

class TechnicienWebController extends Controller
{
    /**
     * Afficher la liste des techniciens.
     */
    public function index()
    {
        $techniciens = Technicien::withCount('reparations')
            ->orderBy('nom')
            ->paginate(9);

        return view('garage.techniciens.index', compact('techniciens'));
    }

    /**
     * Afficher le formulaire d'ajout d'un technicien.
     */
    public function create()
    {
        return view('garage.techniciens.create');
    }

    /**
     * Enregistrer un nouveau technicien.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
        ]);

        Technicien::create($validated);

        return redirect()
            ->route('garage.techniciens.index')
            ->with('success', 'Technicien ajouté avec succès.');
    }

    /**
     * Afficher le formulaire de modification d'un technicien.
     */
    public function edit(Technicien $technicien)
    {
        return view('garage.techniciens.edit', compact('technicien'));
    }

    /**
     * Modifier un technicien.
     */
    public function update(Request $request, Technicien $technicien)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
        ]);

        $technicien->update($validated);

        return redirect()
            ->route('garage.techniciens.index')
            ->with('success', 'Technicien modifié avec succès.');
    }

    /**
     * Supprimer un technicien.
     */
    public function destroy(Technicien $technicien)
    {
        $technicien->delete();

        return redirect()
            ->route('garage.techniciens.index')
            ->with('success', 'Technicien supprimé avec succès.');
    }
}