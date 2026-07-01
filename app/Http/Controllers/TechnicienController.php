<?php

namespace App\Http\Controllers;

use App\Models\Technicien;
use Illuminate\Http\Request;

class TechnicienController extends Controller
{
    public function index()
    {
        $techniciens = Technicien::with('reparations')->get();

        return response()->json($techniciens);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
        ]);

        $technicien = Technicien::create($validated);

        return response()->json($technicien, 201);
    }

    public function show(Technicien $technicien)
    {
        return response()->json(
            $technicien->load('reparations')
        );
    }

    public function update(Request $request, Technicien $technicien)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
        ]);

        $technicien->update($validated);

        return response()->json($technicien);
    }

    public function destroy(Technicien $technicien)
    {
        $technicien->delete();

        return response()->json([
            'message' => 'Technicien supprimé avec succès.'
        ]);
    }
}