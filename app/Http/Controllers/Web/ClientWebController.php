<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientWebController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $clients = Client::withCount('vehicules')
            ->when($search, function ($query) use ($search) {
                $query->where('nom', 'like', "%{$search}%")
                    ->orWhere('prenom', 'like', "%{$search}%")
                    ->orWhere('telephone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('garage.clients.index', compact('clients', 'search'));
    }

    public function create()
    {
        return view('garage.clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:30|unique:clients,telephone',
            'email' => 'nullable|email|max:255|unique:clients,email',
            'adresse' => 'nullable|string|max:255',
        ]);

        Client::create($validated);

        return redirect()
            ->route('garage.clients.index')
            ->with('success', 'Client ajouté avec succès.');
    }

    public function show(Client $client)
    {
        $client->load('vehicules.reparations.techniciens');

        return view('garage.clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('garage.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:30|unique:clients,telephone,' . $client->id,
            'email' => 'nullable|email|max:255|unique:clients,email,' . $client->id,
            'adresse' => 'nullable|string|max:255',
        ]);

        $client->update($validated);

        return redirect()
            ->route('garage.clients.index')
            ->with('success', 'Client modifié avec succès.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()
            ->route('garage.clients.index')
            ->with('success', 'Client supprimé avec succès.');
    }
}