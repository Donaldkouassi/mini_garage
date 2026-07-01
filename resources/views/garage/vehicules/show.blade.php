@extends('base')

@section('title', 'Détail du véhicule - Garage 2KYD')

@section('content')
<style>
    .detail-header {
        background: linear-gradient(135deg, #1e3a8a, #2563eb, #3b82f6);
        color: white;
        border-radius: 24px;
        padding: 38px 32px;
        box-shadow: 0 15px 35px rgba(37, 99, 235, 0.20);
        margin-bottom: 30px;
    }

    .detail-header h1 {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .detail-header p {
        font-size: 1.08rem;
        margin-bottom: 0;
        color: rgba(255, 255, 255, 0.92);
    }

    .plate-badge {
        background: rgba(255, 255, 255, 0.18);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.25);
        padding: 10px 18px;
        border-radius: 999px;
        font-weight: 800;
        display: inline-block;
    }

    .detail-card {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        background: white;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        margin-bottom: 30px;
    }

    .detail-card-header {
        background: linear-gradient(90deg, #111827, #1f2937);
        color: white;
        padding: 20px 26px;
    }

    .detail-card-header h2 {
        font-size: 1.45rem;
        font-weight: 800;
        margin-bottom: 0;
    }

    .detail-card-body {
        padding: 30px 26px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .info-item {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 18px;
    }

    .info-label {
        font-size: 0.85rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #6b7280;
        margin-bottom: 6px;
    }

    .info-value {
        font-size: 1.15rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 0;
    }

    .repair-card {
        border: none;
        border-radius: 22px;
        background: white;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
        transition: 0.25s ease;
        height: 100%;
    }

    .repair-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 38px rgba(15, 23, 42, 0.13);
    }

    .repair-card-top {
        background: linear-gradient(90deg, #111827, #1f2937);
        color: white;
        padding: 18px 22px;
    }

    .repair-date {
        font-weight: 800;
        font-size: 1.15rem;
        margin-bottom: 0;
    }

    .repair-card-body {
        padding: 24px 22px;
    }

    .section-label {
        font-size: 0.85rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #6b7280;
        margin-bottom: 6px;
    }

    .objet-box {
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 14px 16px;
        color: #111827;
        line-height: 1.5;
        min-height: 92px;
    }

    .duration-badge {
        display: inline-block;
        background: #fff7ed;
        color: #ea580c;
        border: 1px solid #fed7aa;
        border-radius: 999px;
        padding: 8px 14px;
        font-weight: 800;
        white-space: nowrap;
        margin-top: 14px;
    }

    .technicien-badge {
        display: inline-block;
        background: #111827;
        color: white;
        border-radius: 999px;
        padding: 7px 12px;
        font-size: 0.84rem;
        font-weight: 700;
        margin: 3px 2px;
        white-space: nowrap;
    }

    .empty-box {
        background: white;
        padding: 45px;
        border-radius: 22px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0,0,0,0.06);
        color: #6b7280;
    }

    .btn-action {
        border-radius: 14px;
        padding: 12px 22px;
        font-weight: 800;
    }

    @media (max-width: 768px) {
        .info-grid {
            grid-template-columns: 1fr;
        }

        .detail-header h1 {
            font-size: 2.2rem;
        }
    }
</style>

<div class="mb-4 d-flex gap-2 flex-wrap">
    <a href="{{ route('garage.vehicules.index') }}" class="btn btn-outline-secondary rounded-pill fw-bold">
        ← Retour aux véhicules
    </a>

    <a href="{{ route('garage.dashboard') }}" class="btn btn-outline-secondary rounded-pill fw-bold">
        ← Retour au menu
    </a>
</div>

<div class="detail-header">
    <div class="row align-items-center g-4">
        <div class="col-lg-8">
            <h1>
                {{ $vehicule->marque }} {{ $vehicule->modele }}
            </h1>

            <p>
                Consultez les informations détaillées du véhicule et les réparations qui lui sont associées.
            </p>
        </div>

        <div class="col-lg-4 text-lg-end">
            <span class="plate-badge">
                {{ $vehicule->immatriculation }}
            </span>
        </div>
    </div>
</div>

<div class="detail-card">
    <div class="detail-card-header">
        <h2>Informations du véhicule</h2>
    </div>

    <div class="detail-card-body">
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">Immatriculation</div>
                <p class="info-value">{{ $vehicule->immatriculation }}</p>
            </div>

            <div class="info-item">
                <div class="info-label">Marque</div>
                <p class="info-value">{{ $vehicule->marque }}</p>
            </div>

            <div class="info-item">
                <div class="info-label">Modèle</div>
                <p class="info-value">{{ $vehicule->modele }}</p>
            </div>

            <div class="info-item">
                <div class="info-label">Couleur</div>
                <p class="info-value">{{ $vehicule->couleur }}</p>
            </div>

            <div class="info-item">
                <div class="info-label">Année</div>
                <p class="info-value">{{ $vehicule->annee }}</p>
            </div>

            <div class="info-item">
                <div class="info-label">Kilométrage</div>
                <p class="info-value">
                    {{ number_format($vehicule->kilometrage, 0, ',', ' ') }} km
                </p>
            </div>

            <div class="info-item">
                <div class="info-label">Carrosserie</div>
                <p class="info-value">{{ $vehicule->carrosserie }}</p>
            </div>

            <div class="info-item">
                <div class="info-label">Énergie</div>
                <p class="info-value">{{ $vehicule->energie }}</p>
            </div>

            <div class="info-item">
                <div class="info-label">Boîte</div>
                <p class="info-value">{{ $vehicule->boite }}</p>
            </div>

            <div class="info-item">
                <div class="info-label">Nombre de réparations</div>
                <p class="info-value">
                    {{ $vehicule->reparations->count() }} réparation(s)
                </p>
            </div>
        </div>

        <div class="d-flex gap-2 flex-wrap mt-4">
            <a href="{{ route('garage.vehicules.edit', $vehicule) }}" class="btn btn-dark btn-action">
                Modifier ce véhicule
            </a>

            <a href="{{ route('garage.reparations.create') }}" class="btn btn-outline-primary btn-action">
                Ajouter une réparation
            </a>
        </div>
    </div>
</div>

<div class="detail-card">
    <div class="detail-card-header">
        <h2>Réparations liées à ce véhicule</h2>
    </div>

    <div class="detail-card-body">
        @if($vehicule->reparations->isEmpty())
            <div class="empty-box">
                <h4 class="fw-bold mb-2">Aucune réparation enregistrée</h4>

                <p class="mb-0">
                    Ce véhicule n’a pas encore de réparation associée.
                </p>
            </div>
        @else
            <div class="row g-4">
                @foreach($vehicule->reparations as $reparation)
                    <div class="col-md-6 col-xl-4">
                        <div class="repair-card">
                            <div class="repair-card-top">
                                <p class="repair-date">
                                    {{ \Carbon\Carbon::parse($reparation->date)->format('d/m/Y') }}
                                </p>
                            </div>

                            <div class="repair-card-body">
                                <div class="section-label">
                                    Objet de la réparation
                                </div>

                                <div class="objet-box">
                                    {{ $reparation->objet_reparation }}
                                </div>

                                <div>
                                    <span class="duration-badge">
                                        {{ intval($reparation->duree_main_oeuvre) }} h de main-d’œuvre
                                    </span>
                                </div>

                                <div class="mt-3">
                                    <div class="section-label">
                                        Techniciens affectés
                                    </div>

                                    @forelse($reparation->techniciens as $technicien)
                                        <span class="technicien-badge">
                                            {{ $technicien->prenom }} {{ $technicien->nom }}
                                        </span>
                                    @empty
                                        <span class="text-muted">Aucun technicien</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection