@extends('base')

@section('title', 'Ajouter un véhicule - Garage 2KYD')

@section('content')
<style>
    .form-page-header {
        background: linear-gradient(135deg, #1e3a8a, #2563eb, #3b82f6);
        color: white;
        border-radius: 24px;
        padding: 35px 32px;
        box-shadow: 0 15px 35px rgba(37, 99, 235, 0.20);
        margin-bottom: 30px;
    }

    .form-page-header h1 {
        font-size: 2.6rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .form-page-header p {
        font-size: 1.08rem;
        color: rgba(255, 255, 255, 0.92);
        margin-bottom: 0;
    }

    .form-card {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        background: white;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
    }

    .form-card-header {
        background: linear-gradient(90deg, #111827, #1f2937);
        color: white;
        padding: 20px 26px;
    }

    .form-card-header h2 {
        font-size: 1.45rem;
        font-weight: 800;
        margin-bottom: 0;
    }

    .form-card-body {
        padding: 30px 26px;
    }

    .form-label {
        font-weight: 800;
        color: #111827;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border-radius: 14px;
        padding: 12px 14px;
        border: 1px solid #d1d5db;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 0.18rem rgba(37, 99, 235, 0.18);
    }

    .btn-save {
        background: #111827;
        color: white;
        border: none;
        border-radius: 14px;
        padding: 12px 22px;
        font-weight: 800;
    }

    .btn-save:hover {
        background: #1f2937;
        color: white;
    }

    .btn-cancel {
        border-radius: 14px;
        padding: 12px 22px;
        font-weight: 800;
    }

    .help-box {
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        color: #1d4ed8;
        border-radius: 18px;
        padding: 18px;
        height: 100%;
    }

    .help-box h5 {
        font-weight: 800;
        margin-bottom: 10px;
    }

    .help-box ul {
        margin-bottom: 0;
        padding-left: 18px;
    }
</style>

<div class="mb-4">
    <a href="{{ route('garage.vehicules.index') }}" class="btn btn-outline-secondary rounded-pill fw-bold">
        ← Retour aux véhicules
    </a>
</div>

<div class="form-page-header">
    <h1>Ajouter un véhicule</h1>

    <p>
        Enregistrez un nouveau véhicule dans le système de gestion du Garage 2KYD.
    </p>
</div>

@if($errors->any())
    <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
        <strong>Veuillez corriger les erreurs suivantes :</strong>

        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-card">
    <div class="form-card-header">
        <h2>Informations du véhicule</h2>
    </div>

    <div class="form-card-body">
        <form method="POST" action="{{ route('garage.vehicules.store') }}">
            @csrf

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="immatriculation" class="form-label">Immatriculation</label>
                            <input type="text"
                                   name="immatriculation"
                                   id="immatriculation"
                                   class="form-control"
                                   value="{{ old('immatriculation') }}"
                                   placeholder="Exemple : CI-2026-AB"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="marque" class="form-label">Marque</label>
                            <input type="text"
                                   name="marque"
                                   id="marque"
                                   class="form-control"
                                   value="{{ old('marque') }}"
                                   placeholder="Exemple : Toyota"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="modele" class="form-label">Modèle</label>
                            <input type="text"
                                   name="modele"
                                   id="modele"
                                   class="form-control"
                                   value="{{ old('modele') }}"
                                   placeholder="Exemple : Corolla"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="couleur" class="form-label">Couleur</label>
                            <input type="text"
                                   name="couleur"
                                   id="couleur"
                                   class="form-control"
                                   value="{{ old('couleur') }}"
                                   placeholder="Exemple : Noir"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="annee" class="form-label">Année</label>
                            <input type="number"
                                   name="annee"
                                   id="annee"
                                   class="form-control"
                                   value="{{ old('annee') }}"
                                   min="1900"
                                   max="2100"
                                   placeholder="Exemple : 2022"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="kilometrage" class="form-label">Kilométrage</label>
                            <input type="number"
                                   name="kilometrage"
                                   id="kilometrage"
                                   class="form-control"
                                   value="{{ old('kilometrage') }}"
                                   min="0"
                                   placeholder="Exemple : 45000"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="carrosserie" class="form-label">Carrosserie</label>
                            <input type="text"
                                   name="carrosserie"
                                   id="carrosserie"
                                   class="form-control"
                                   value="{{ old('carrosserie') }}"
                                   placeholder="Exemple : SUV"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="energie" class="form-label">Énergie</label>
                            <select name="energie" id="energie" class="form-select" required>
                                <option value="">-- Choisir --</option>
                                <option value="Essence" @selected(old('energie') == 'Essence')>Essence</option>
                                <option value="Diesel" @selected(old('energie') == 'Diesel')>Diesel</option>
                                <option value="Hybride" @selected(old('energie') == 'Hybride')>Hybride</option>
                                <option value="Électrique" @selected(old('energie') == 'Électrique')>Électrique</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="boite" class="form-label">Boîte</label>
                            <select name="boite" id="boite" class="form-select" required>
                                <option value="">-- Choisir --</option>
                                <option value="Manuelle" @selected(old('boite') == 'Manuelle')>Manuelle</option>
                                <option value="Automatique" @selected(old('boite') == 'Automatique')>Automatique</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="help-box">
                        <h5>Conseil de saisie</h5>

                        <ul>
                            <li>Utilisez une immatriculation unique.</li>
                            <li>Le kilométrage doit être un nombre entier.</li>
                            <li>Choisissez correctement l’énergie et la boîte.</li>
                            <li>Ces informations seront visibles dans la liste des véhicules.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 flex-wrap mt-4">
                <button type="submit" class="btn btn-save">
                    Enregistrer le véhicule
                </button>

                <a href="{{ route('garage.vehicules.index') }}" class="btn btn-outline-secondary btn-cancel">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection