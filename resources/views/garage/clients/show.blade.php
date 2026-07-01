@extends('base')

@section('title', 'Fiche client - Garage 2KYD')

@section('content')
<style>
    .client-detail-header {
        background: linear-gradient(135deg, #7c3aed, #2563eb);
        color: white;
        border-radius: 24px;
        padding: 35px 32px;
        box-shadow: 0 15px 35px rgba(37, 99, 235, 0.22);
        margin-bottom: 30px;
    }

    .client-detail-header h1 {
        font-size: 2.6rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .client-detail-header p {
        font-size: 1.08rem;
        color: rgba(255, 255, 255, 0.92);
        margin-bottom: 0;
    }

    .detail-card {
        background: white;
        border-radius: 22px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        padding: 24px;
        height: 100%;
    }

    .detail-card h3 {
        font-size: 1.25rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 18px;
    }

    .info-line {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        padding: 11px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .info-line:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 800;
        color: #475569;
    }

    .info-value {
        color: #111827;
        text-align: right;
    }

    .vehicule-card {
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 18px;
        margin-bottom: 15px;
    }

    .vehicule-title {
        font-size: 1.15rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 5px;
    }

    .plate-badge {
        display: inline-block;
        background: #eef2ff;
        color: #3730a3;
        border: 1px solid #c7d2fe;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 0.85rem;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .repair-box {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 12px;
        margin-top: 10px;
    }

    .tech-badge {
        display: inline-block;
        background: #fff7ed;
        color: #c2410c;
        border: 1px solid #fed7aa;
        padding: 5px 9px;
        border-radius: 999px;
        font-size: 0.8rem;
        font-weight: 700;
        margin: 4px 4px 0 0;
    }

    .empty-box {
        background: white;
        border-radius: 22px;
        padding: 35px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.07);
    }

    .btn-action {
        border-radius: 12px;
        font-weight: 700;
    }
</style>

<div class="mb-4 d-flex flex-wrap gap-2">
    <a href="{{ route('garage.clients.index') }}" class="btn btn-outline-secondary rounded-pill fw-bold">
        ← Retour aux clients
    </a>

    <a href="{{ route('garage.dashboard') }}" class="btn btn-outline-dark rounded-pill fw-bold">
        Retour au menu
    </a>
</div>

<div class="client-detail-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <h1>{{ $client->prenom }} {{ $client->nom }}</h1>

        <p>
            Fiche détaillée du client et suivi de ses véhicules.
        </p>
    </div>

    <a href="{{ route('garage.clients.edit', $client) }}" class="btn btn-light fw-bold rounded-pill px-4 py-2">
        Modifier le client
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="detail-card">
            <h3>Informations du client</h3>

            <div class="info-line">
                <span class="info-label">Nom</span>
                <span class="info-value">{{ $client->nom }}</span>
            </div>

            <div class="info-line">
                <span class="info-label">Prénom</span>
                <span class="info-value">{{ $client->prenom }}</span>
            </div>

            <div class="info-line">
                <span class="info-label">Téléphone</span>
                <span class="info-value">{{ $client->telephone }}</span>
            </div>

            <div class="info-line">
                <span class="info-label">Email</span>
                <span class="info-value">{{ $client->email ?? 'Non renseigné' }}</span>
            </div>

            <div class="info-line">
                <span class="info-label">Adresse</span>
                <span class="info-value">{{ $client->adresse ?? 'Non renseignée' }}</span>
            </div>

            <div class="info-line">
                <span class="info-label">Nombre de véhicules</span>
                <span class="info-value">{{ $client->vehicules->count() }}</span>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="detail-card">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                <h3 class="mb-0">Véhicules du client</h3>

                <a href="{{ route('garage.vehicules.create') }}" class="btn btn-dark btn-sm btn-action">
                    + Ajouter un véhicule
                </a>
            </div>

            @forelse($client->vehicules as $vehicule)
                <div class="vehicule-card">
                    <div class="vehicule-title">
                        {{ $vehicule->marque }} {{ $vehicule->modele }}
                    </div>

                    <div class="plate-badge">
                        {{ $vehicule->immatriculation }}
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-line">
                                <span class="info-label">Couleur</span>
                                <span class="info-value">{{ $vehicule->couleur }}</span>
                            </div>

                            <div class="info-line">
                                <span class="info-label">Année</span>
                                <span class="info-value">{{ $vehicule->annee }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-line">
                                <span class="info-label">Énergie</span>
                                <span class="info-value">{{ $vehicule->energie }}</span>
                            </div>

                            <div class="info-line">
                                <span class="info-label">Réparations</span>
                                <span class="info-value">{{ $vehicule->reparations->count() }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <a href="{{ route('garage.vehicules.show', $vehicule) }}" class="btn btn-outline-primary btn-sm btn-action">
                            Voir véhicule
                        </a>

                        <a href="{{ route('garage.vehicules.edit', $vehicule) }}" class="btn btn-outline-warning btn-sm btn-action">
                            Modifier véhicule
                        </a>
                    </div>

                    @if($vehicule->reparations->count() > 0)
                        <div class="mt-3">
                            <div class="fw-bold text-muted mb-2">
                                Dernières réparations
                            </div>

                            @foreach($vehicule->reparations as $reparation)
                                <div class="repair-box">
                                    <div class="fw-bold">
                                        {{ \Carbon\Carbon::parse($reparation->date)->format('d/m/Y') }}
                                        —
                                        {{ intval($reparation->duree_main_oeuvre) }} h
                                    </div>

                                    <div class="text-muted">
                                        {{ $reparation->objet_reparation }}
                                    </div>

                                    <div class="mt-2">
                                        @forelse($reparation->techniciens as $technicien)
                                            <span class="tech-badge">
                                                {{ $technicien->prenom }} {{ $technicien->nom }}
                                            </span>
                                        @empty
                                            <span class="text-muted">Aucun technicien affecté</span>
                                        @endforelse
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @empty
                <div class="empty-box">
                    <h4 class="fw-bold">Aucun véhicule associé</h4>

                    <p class="text-muted mb-3">
                        Ce client n’a pas encore de véhicule enregistré.
                    </p>

                    <a href="{{ route('garage.vehicules.create') }}" class="btn btn-dark rounded-pill fw-bold px-4">
                        Ajouter un véhicule
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection