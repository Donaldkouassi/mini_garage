@extends('base')

@section('title', 'Ajouter une réparation - Garage 2KYD')

@section('content')
<style>
    .form-page-header {
        background: linear-gradient(135deg, #f97316, #ef4444);
        color: white;
        border-radius: 24px;
        padding: 35px 32px;
        box-shadow: 0 15px 35px rgba(239, 68, 68, 0.22);
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
        border-color: #f97316;
        box-shadow: 0 0 0 0.18rem rgba(249, 115, 22, 0.18);
    }

    textarea.form-control {
        min-height: 130px;
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
        background: #fff7ed;
        border: 1px solid #fed7aa;
        color: #c2410c;
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

    .small-note {
        color: #6b7280;
        font-size: 0.9rem;
        margin-top: 6px;
    }
</style>

<div class="mb-4">
    <a href="{{ route('garage.reparations.index') }}" class="btn btn-outline-secondary rounded-pill fw-bold">
        ← Retour aux réparations
    </a>
</div>

<div class="form-page-header">
    <h1>Ajouter une réparation</h1>

    <p>
        Enregistrez une nouvelle réparation et affectez les techniciens concernés.
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
        <h2>Informations de la réparation</h2>
    </div>

    <div class="form-card-body">
        <form method="POST" action="{{ route('garage.reparations.store') }}">
            @csrf

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="vehicule_id" class="form-label">Véhicule concerné</label>

                        <select name="vehicule_id" id="vehicule_id" class="form-select" required>
                            <option value="">-- Choisir un véhicule --</option>

                            @foreach($vehicules as $vehicule)
                                <option value="{{ $vehicule->id }}" @selected(old('vehicule_id') == $vehicule->id)>
                                    {{ $vehicule->marque }} {{ $vehicule->modele }} — {{ $vehicule->immatriculation }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="date" class="form-label">Date de réparation</label>

                            <input type="date"
                                   name="date"
                                   id="date"
                                   class="form-control"
                                   value="{{ old('date') }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="duree_main_oeuvre" class="form-label">
                                Durée main-d’œuvre en heures
                            </label>

                            <input type="number"
                                   name="duree_main_oeuvre"
                                   id="duree_main_oeuvre"
                                   class="form-control"
                                   value="{{ old('duree_main_oeuvre') }}"
                                   min="1"
                                   step="1"
                                   placeholder="Exemple : 2"
                                   required>

                            <div class="small-note">
                                Saisir uniquement un nombre entier : 1, 2, 3, 4...
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 mb-3">
                        <label for="objet_reparation" class="form-label">Objet de la réparation</label>

                        <textarea name="objet_reparation"
                                  id="objet_reparation"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Exemple : Vidange moteur et remplacement du filtre à huile"
                                  required>{{ old('objet_reparation') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="techniciens" class="form-label">Techniciens affectés</label>

                        <select name="techniciens[]"
                                id="techniciens"
                                class="form-select"
                                multiple
                                required>
                            @foreach($techniciens as $technicien)
                                <option value="{{ $technicien->id }}"
                                    @selected(collect(old('techniciens'))->contains($technicien->id))>
                                    {{ $technicien->prenom }} {{ $technicien->nom }} — {{ $technicien->specialite }}
                                </option>
                            @endforeach
                        </select>

                        <div class="small-note">
                            Maintiens la touche Cmd pour sélectionner plusieurs techniciens.
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="help-box">
                        <h5>Conseil de saisie</h5>

                        <ul>
                            <li>Choisis d’abord le véhicule concerné.</li>
                            <li>La durée doit être en heures entières.</li>
                            <li>Tu peux affecter plusieurs techniciens.</li>
                            <li>Après validation, la réparation apparaîtra dans la liste.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 flex-wrap mt-4">
                <button type="submit" class="btn btn-save">
                    Enregistrer la réparation
                </button>

                <a href="{{ route('garage.reparations.index') }}" class="btn btn-outline-secondary btn-cancel">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection