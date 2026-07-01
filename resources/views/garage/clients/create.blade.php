@extends('base')

@section('title', 'Ajouter un client - Garage 2KYD')

@section('content')
<div class="mb-4">
    <a href="{{ route('garage.clients.index') }}" class="btn btn-outline-secondary rounded-pill fw-bold">
        ← Retour aux clients
    </a>
</div>

<div class="p-5 rounded-4 text-white mb-4" style="background: linear-gradient(135deg, #7c3aed, #2563eb);">
    <h1 class="fw-bold">Ajouter un client</h1>
    <p class="mb-0">Enregistrez un nouveau propriétaire de véhicule.</p>
</div>

@if($errors->any())
    <div class="alert alert-danger rounded-4">
        <strong>Erreur :</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">
        <form method="POST" action="{{ route('garage.clients.store') }}">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nom</label>
                    <input type="text" name="nom" class="form-control rounded-3" value="{{ old('nom') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Prénom</label>
                    <input type="text" name="prenom" class="form-control rounded-3" value="{{ old('prenom') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Téléphone</label>
                    <input type="text" name="telephone" class="form-control rounded-3" value="{{ old('telephone') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control rounded-3" value="{{ old('email') }}">
                </div>

                <div class="col-12">
                    <label class="form-label fw-bold">Adresse</label>
                    <input type="text" name="adresse" class="form-control rounded-3" value="{{ old('adresse') }}">
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-dark rounded-pill fw-bold px-4">
                    Enregistrer le client
                </button>

                <a href="{{ route('garage.clients.index') }}" class="btn btn-outline-secondary rounded-pill fw-bold px-4">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection