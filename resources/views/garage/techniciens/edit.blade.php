@extends('base')

@section('title', 'Modifier un technicien - Garage 2KYD')

@section('content')
<style>
    .form-page-header {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        border-radius: 24px;
        padding: 35px 32px;
        box-shadow: 0 15px 35px rgba(16, 185, 129, 0.22);
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

    .form-control {
        border-radius: 14px;
        padding: 12px 14px;
        border: 1px solid #d1d5db;
    }

    .form-control:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 0.18rem rgba(16, 185, 129, 0.18);
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
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #047857;
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
    <a href="{{ route('garage.techniciens.index') }}" class="btn btn-outline-secondary rounded-pill fw-bold">
        ← Retour aux techniciens
    </a>
</div>

<div class="form-page-header">
    <h1>Modifier un technicien</h1>

    <p>
        Mettez à jour les informations du technicien sélectionné dans le système Garage 2KYD.
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
        <h2>
            Technicien : {{ $technicien->prenom }} {{ $technicien->nom }}
        </h2>
    </div>

    <div class="form-card-body">
        <form method="POST" action="{{ route('garage.techniciens.update', $technicien) }}">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom</label>

                            <input type="text"
                                   name="nom"
                                   id="nom"
                                   class="form-control"
                                   value="{{ old('nom', $technicien->nom) }}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prénom</label>

                            <input type="text"
                                   name="prenom"
                                   id="prenom"
                                   class="form-control"
                                   value="{{ old('prenom', $technicien->prenom) }}"
                                   required>
                        </div>

                        <div class="col-md-12">
                            <label for="specialite" class="form-label">Spécialité</label>

                            <input type="text"
                                   name="specialite"
                                   id="specialite"
                                   class="form-control"
                                   value="{{ old('specialite', $technicien->specialite) }}"
                                   required>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="help-box">
                        <h5>Modification du technicien</h5>

                        <ul>
                            <li>Vérifiez le nom et le prénom.</li>
                            <li>Gardez une spécialité claire.</li>
                            <li>Les réparations associées seront conservées.</li>
                            <li>Après validation, vous serez redirigé vers la liste.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 flex-wrap mt-4">
                <button type="submit" class="btn btn-save">
                    Enregistrer les modifications
                </button>

                <a href="{{ route('garage.techniciens.index') }}" class="btn btn-outline-secondary btn-cancel">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection