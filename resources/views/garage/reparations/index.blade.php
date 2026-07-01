@extends('base')

@section('title', 'Réparations - Garage 2KYD')

@section('content')
<style>
    .reparations-header {
        background: linear-gradient(135deg, #f97316, #ef4444);
        color: white;
        border-radius: 24px;
        padding: 35px 32px;
        box-shadow: 0 15px 35px rgba(239, 68, 68, 0.22);
        margin-bottom: 30px;
    }

    .reparations-header h1 {
        font-size: 2.7rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .reparations-header p {
        font-size: 1.08rem;
        color: rgba(255, 255, 255, 0.92);
        margin-bottom: 0;
    }

    .reparation-card {
        border: none;
        border-radius: 22px;
        background: white;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        overflow: hidden;
        height: 100%;
        transition: 0.25s ease;
    }

    .reparation-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.14);
    }

    .reparation-top {
        background: linear-gradient(135deg, #111827, #7c2d12);
        color: white;
        padding: 20px;
    }

    .reparation-title {
        font-size: 1.2rem;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .reparation-date {
        font-size: 0.95rem;
        color: #fed7aa;
    }

    .reparation-body {
        padding: 20px;
    }

    .info-line {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        padding: 9px 0;
        border-bottom: 1px solid #f1f5f9;
        font-size: 0.95rem;
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

    .tech-badge {
        display: inline-block;
        background: #fff7ed;
        color: #c2410c;
        border: 1px solid #fed7aa;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 0.82rem;
        font-weight: 700;
        margin: 4px 4px 0 0;
    }

    .btn-action {
        border-radius: 12px;
        font-weight: 700;
    }

    .empty-box {
        background: white;
        border-radius: 22px;
        padding: 35px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.07);
    }
</style>

<div class="mb-4">
    <a href="{{ route('garage.dashboard') }}" class="btn btn-outline-secondary rounded-pill fw-bold">
        ← Retour au menu
    </a>
</div>

<div class="reparations-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <h1>Réparations</h1>

        <p>
            Consultez les interventions réalisées sur les véhicules du garage.
        </p>
    </div>

    <a href="{{ route('garage.reparations.create') }}" class="btn btn-light fw-bold rounded-pill px-4 py-2">
        + Ajouter une réparation
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
        {{ session('success') }}
    </div>
@endif

@if($reparations->count() > 0)
    <div class="row g-4">
        @foreach($reparations as $reparation)
            <div class="col-md-6 col-lg-4">
                <div class="reparation-card">
                    <div class="reparation-top">
                        <div class="reparation-title">
                            {{ $reparation->vehicule->marque ?? 'Véhicule' }}
                            {{ $reparation->vehicule->modele ?? '' }}
                        </div>

                        <div class="reparation-date">
                            {{ \Carbon\Carbon::parse($reparation->date)->format('d/m/Y') }}
                        </div>
                    </div>

                    <div class="reparation-body">
                        <div class="info-line">
                            <span class="info-label">Immatriculation</span>
                            <span class="info-value">
                                {{ $reparation->vehicule->immatriculation ?? 'Non renseignée' }}
                            </span>
                        </div>

                        <div class="info-line">
                            <span class="info-label">Durée</span>
                            <span class="info-value">
                                {{ intval($reparation->duree_main_oeuvre) }} h de main-d’œuvre
                            </span>
                        </div>

                        <div class="mt-3">
                            <div class="fw-bold text-muted mb-1">Objet de la réparation</div>

                            <p class="mb-0">
                                {{ $reparation->objet_reparation }}
                            </p>
                        </div>

                        <div class="mt-3">
                            <div class="fw-bold text-muted mb-1">Techniciens</div>

                            @forelse($reparation->techniciens as $technicien)
                                <span class="tech-badge">
                                    {{ $technicien->prenom }} {{ $technicien->nom }}
                                </span>
                            @empty
                                <span class="text-muted">Aucun technicien affecté</span>
                            @endforelse
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <a href="{{ route('garage.reparations.edit', $reparation) }}" class="btn btn-outline-warning btn-sm btn-action">
                                Modifier
                            </a>

                            <form method="POST"
                                  action="{{ route('garage.reparations.destroy', $reparation) }}"
                                  onsubmit="return confirm('Voulez-vous vraiment supprimer cette réparation ?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-outline-danger btn-sm btn-action">
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
        {{ $reparations->links() }}
    </div>
@else
    <div class="empty-box">
        <h4 class="fw-bold">Aucune réparation enregistrée</h4>

        <p class="text-muted mb-3">
            Ajoutez une première réparation pour commencer le suivi.
        </p>

        <a href="{{ route('garage.reparations.create') }}" class="btn btn-dark rounded-pill fw-bold px-4">
            Ajouter une réparation
        </a>
    </div>
@endif
@endsection