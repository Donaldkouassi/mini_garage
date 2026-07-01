@extends('base')

@section('title', 'Menu principal - Garage 2KYD')

@section('content')
<style>
    .hero-dashboard {
        background: linear-gradient(135deg, #2563eb, #7c3aed);
        color: white;
        border-radius: 24px;
        padding: 70px 40px;
        text-align: center;
        box-shadow: 0 18px 45px rgba(37, 99, 235, 0.25);
        margin-bottom: 55px;
    }

    .hero-dashboard h1 {
        font-size: 3.2rem;
        font-weight: 800;
        margin-bottom: 22px;
    }

    .hero-dashboard p {
        font-size: 1.15rem;
        color: rgba(255, 255, 255, 0.92);
        max-width: 950px;
        margin: 0 auto 30px auto;
    }

    .hero-actions {
        display: flex;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .hero-actions .btn {
        border-radius: 12px;
        padding: 13px 28px;
        font-weight: 800;
    }

    .module-card {
        background: white;
        border-radius: 24px;
        border: none;
        box-shadow: 0 12px 35px rgba(15, 23, 42, 0.08);
        padding: 34px 26px;
        text-align: center;
        height: 100%;
        transition: 0.25s ease;
    }

    .module-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 45px rgba(15, 23, 42, 0.14);
    }

    .module-icon {
        width: 72px;
        height: 72px;
        border-radius: 18px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 24px auto;
    }

    .icon-client {
        background: linear-gradient(135deg, #7c3aed, #2563eb);
    }

    .icon-vehicule {
        background: linear-gradient(135deg, #0ea5e9, #2563eb);
    }

    .icon-reparation {
        background: linear-gradient(135deg, #f97316, #ef4444);
    }

    .icon-technicien {
        background: linear-gradient(135deg, #22c55e, #059669);
    }

    .module-card h2 {
        font-size: 2rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 18px;
    }

    .module-card p {
        color: #475569;
        font-size: 1rem;
        min-height: 78px;
        margin-bottom: 28px;
    }

    .btn-module {
        border-radius: 12px;
        padding: 11px 25px;
        font-weight: 800;
        color: white;
        border: none;
    }

    .btn-client {
        background: #7c3aed;
    }

    .btn-client:hover {
        background: #6d28d9;
        color: white;
    }

    .btn-vehicule {
        background: #2563eb;
    }

    .btn-vehicule:hover {
        background: #1d4ed8;
        color: white;
    }

    .btn-reparation {
        background: #e11d48;
    }

    .btn-reparation:hover {
        background: #be123c;
        color: white;
    }

    .btn-technicien {
        background: #059669;
    }

    .btn-technicien:hover {
        background: #047857;
        color: white;
    }

    @media (max-width: 768px) {
        .hero-dashboard {
            padding: 45px 24px;
        }

        .hero-dashboard h1 {
            font-size: 2.2rem;
        }
    }
</style>

<div class="hero-dashboard">
    <h1>Bienvenue sur le menu de gestion du garage</h1>

    <p>
        Cette plateforme facilite la gestion des clients, des véhicules, le suivi des réparations
        et l’organisation des techniciens du <strong>Garage 2KYD</strong>.
    </p>

    <div class="hero-actions">
        <a href="{{ route('garage.clients.index') }}" class="btn btn-light">
            Gérer les clients
        </a>

        <a href="{{ route('garage.vehicules.index') }}" class="btn btn-outline-light">
            Gérer les véhicules
        </a>

        <a href="{{ route('garage.reparations.index') }}" class="btn btn-outline-light">
            Gérer les réparations
        </a>

        <a href="{{ route('garage.techniciens.index') }}" class="btn btn-outline-light">
            Gérer les techniciens
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6 col-xl-3">
        <div class="module-card">
            <div class="module-icon icon-client">
                👤
            </div>

            <h2>Clients</h2>

            <p>
                Ajouter, consulter, modifier et supprimer les propriétaires des véhicules du garage.
            </p>

            <a href="{{ route('garage.clients.index') }}" class="btn btn-module btn-client">
                Accéder
            </a>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="module-card">
            <div class="module-icon icon-vehicule">
                🚗
            </div>

            <h2>Véhicules</h2>

            <p>
                Ajouter, consulter, modifier et supprimer les véhicules enregistrés dans le garage.
            </p>

            <a href="{{ route('garage.vehicules.index') }}" class="btn btn-module btn-vehicule">
                Accéder
            </a>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="module-card">
            <div class="module-icon icon-reparation">
                🔧
            </div>

            <h2>Réparations</h2>

            <p>
                Suivre les réparations effectuées, leur modification et l’affectation des techniciens.
            </p>

            <a href="{{ route('garage.reparations.index') }}" class="btn btn-module btn-reparation">
                Accéder
            </a>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="module-card">
            <div class="module-icon icon-technicien">
                👨‍🔧
            </div>

            <h2>Techniciens</h2>

            <p>
                Gérer les techniciens, leurs spécialités et consulter leur participation aux réparations.
            </p>

            <a href="{{ route('garage.techniciens.index') }}" class="btn btn-module btn-technicien">
                Accéder
            </a>
        </div>
    </div>
</div>
@endsection