@extends('base')

@section('title', 'Véhicules - Garage 2KYD')

@section('content')
<style>
    .page-header-box {
        background: linear-gradient(135deg, #1e3a8a, #2563eb, #3b82f6);
        color: white;
        border-radius: 24px;
        padding: 38px 32px;
        box-shadow: 0 15px 35px rgba(37, 99, 235, 0.20);
        margin-bottom: 30px;
    }

    .page-header-box h1 {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .page-header-box p {
        font-size: 1.08rem;
        margin-bottom: 0;
        color: rgba(255, 255, 255, 0.92);
    }

    .btn-create-vehicle {
        background: white;
        color: #1d4ed8;
        border: none;
        border-radius: 14px;
        padding: 13px 22px;
        font-weight: 800;
    }

    .btn-create-vehicle:hover {
        background: #eff6ff;
        color: #1e40af;
    }

    .stats-pill {
        background: rgba(255, 255, 255, 0.18);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.25);
        padding: 10px 18px;
        border-radius: 999px;
        font-weight: 800;
        display: inline-block;
        margin-top: 14px;
    }

    .search-box {
        background: white;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
        margin-bottom: 30px;
        border: 1px solid #e5e7eb;
    }

    .vehicle-card {
        border: none;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
        transition: 0.25s ease;
        background: white;
        height: 100%;
    }

    .vehicle-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 38px rgba(15, 23, 42, 0.13);
    }

    .vehicle-card-top {
        background: linear-gradient(90deg, #111827, #1f2937);
        color: white;
        padding: 18px 22px;
    }

    .vehicle-plate {
        font-weight: 800;
        font-size: 1.15rem;
        margin-bottom: 0;
    }

    .vehicle-body {
        padding: 24px 22px;
    }

    .vehicle-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 16px;
    }

    .vehicle-info-list {
        list-style: none;
        padding: 0;
        margin: 0 0 18px 0;
    }

    .vehicle-info-list li {
        padding: 8px 0;
        border-bottom: 1px solid #f1f5f9;
        color: #4b5563;
        font-size: 1rem;
    }

    .vehicle-info-list li:last-child {
        border-bottom: none;
    }

    .vehicle-info-list strong {
        color: #111827;
    }

    .repair-badge {
        display: inline-block;
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        color: white;
        padding: 8px 14px;
        border-radius: 999px;
        font-size: 0.92rem;
        font-weight: 800;
        box-shadow: 0 8px 18px rgba(37, 99, 235, 0.22);
    }

    .vehicle-actions {
        display: grid;
        gap: 10px;
        margin-top: 22px;
    }

    .btn-action-detail {
        background: #111827;
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 800;
        padding: 10px 14px;
        width: 100%;
    }

    .btn-action-detail:hover {
        background: #1f2937;
        color: white;
    }

    .btn-action-edit {
        background: #eff6ff;
        color: #2563eb;
        border: 1px solid #bfdbfe;
        border-radius: 12px;
        font-weight: 800;
        padding: 10px 14px;
        width: 100%;
    }

    .btn-action-edit:hover {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .btn-action-delete {
        background: #fef2f2;
        color: #dc2626;
        border: 1px solid #fecaca;
        border-radius: 12px;
        font-weight: 800;
        padding: 10px 14px;
        width: 100%;
    }

    .btn-action-delete:hover {
        background: #fee2e2;
        color: #b91c1c;
    }

    .empty-box {
        background: white;
        padding: 45px;
        border-radius: 22px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
        color: #6b7280;
    }
</style>

<div class="mb-4">
    <a href="{{ route('garage.dashboard') }}" class="btn btn-outline-secondary rounded-pill fw-bold">
        ← Retour au menu
    </a>
</div>

<div class="page-header-box">
    <div class="row align-items-center g-4">
        <div class="col-lg-8">
            <h1>Gestion des véhicules</h1>

            <p>
                Consultez, recherchez, ajoutez, modifiez et supprimez les véhicules enregistrés
                au Garage 2KYD.
            </p>
        </div>

        <div class="col-lg-4 text-lg-end">
            <a href="{{ route('garage.vehicules.create') }}" class="btn btn-create-vehicle">
                + Ajouter un véhicule
            </a>

            <div>
                <span class="stats-pill">
                    {{ $vehicules->total() }} véhicule(s)
                </span>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="search-box">
    <form method="GET" action="{{ route('garage.vehicules.index') }}">
        <div class="row g-3 align-items-center">
            <div class="col-md-9">
                <input type="text"
                       name="search"
                       class="form-control form-control-lg rounded-4"
                       placeholder="Rechercher par marque, modèle ou immatriculation..."
                       value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-dark btn-lg w-100 rounded-4 fw-bold">
                    Rechercher
                </button>
            </div>
        </div>

        @if(request('search'))
            <div class="mt-3">
                <a href="{{ route('garage.vehicules.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill fw-bold">
                    Réinitialiser la recherche
                </a>
            </div>
        @endif
    </form>
</div>

@if($vehicules->isEmpty())
    <div class="empty-box">
        <h4 class="fw-bold mb-2">Aucun véhicule trouvé</h4>

        <p class="mb-0">
            Ajoutez un véhicule ou essayez une autre recherche.
        </p>
    </div>
@else
    <div class="row g-4">
        @foreach($vehicules as $vehicule)
            <div class="col-md-6 col-xl-4">
                <div class="vehicle-card">
                    <div class="vehicle-card-top">
                        <p class="vehicle-plate">
                            {{ $vehicule->immatriculation }}
                        </p>
                    </div>

                    <div class="vehicle-body">
                        <div class="vehicle-title">
                            {{ $vehicule->marque }} {{ $vehicule->modele }}
                        </div>

                        <ul class="vehicle-info-list">
                            <li>
                                <strong>Couleur :</strong> {{ $vehicule->couleur }}
                            </li>

                            <li>
                                <strong>Année :</strong> {{ $vehicule->annee }}
                            </li>

                            <li>
                                <strong>Kilométrage :</strong>
                                {{ number_format($vehicule->kilometrage, 0, ',', ' ') }} km
                            </li>

                            <li>
                                <strong>Carrosserie :</strong> {{ $vehicule->carrosserie }}
                            </li>

                            <li>
                                <strong>Énergie :</strong> {{ $vehicule->energie }}
                            </li>

                            <li>
                                <strong>Boîte :</strong> {{ $vehicule->boite }}
                            </li>
                        </ul>

                        <div>
                            <span class="repair-badge">
                                {{ $vehicule->reparations_count ?? 0 }} réparation(s)
                            </span>
                        </div>

                        <div class="vehicle-actions">
                            <a href="{{ route('garage.vehicules.show', $vehicule) }}"
                               class="btn btn-action-detail">
                                Voir le détail
                            </a>

                            <a href="{{ route('garage.vehicules.edit', $vehicule) }}"
                               class="btn btn-action-edit">
                                Modifier
                            </a>

                            <form method="POST"
                                  action="{{ route('garage.vehicules.destroy', $vehicule) }}"
                                  onsubmit="return confirm('Voulez-vous vraiment supprimer ce véhicule ?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-action-delete">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $vehicules->links() }}
    </div>
@endif
@endsection