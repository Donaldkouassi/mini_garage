@extends('base')

@section('title', 'Clients - Garage 2KYD')

@section('content')
<style>
    .clients-header {
        background: linear-gradient(135deg, #7c3aed, #2563eb);
        color: white;
        border-radius: 24px;
        padding: 35px 32px;
        box-shadow: 0 15px 35px rgba(37, 99, 235, 0.22);
        margin-bottom: 30px;
    }

    .clients-header h1 {
        font-size: 2.7rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .clients-header p {
        font-size: 1.08rem;
        color: rgba(255, 255, 255, 0.92);
        margin-bottom: 0;
    }

    .search-card,
    .client-card,
    .empty-box {
        background: white;
        border-radius: 22px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
    }

    .search-card {
        padding: 20px;
        margin-bottom: 24px;
    }

    .client-card {
        border: none;
        overflow: hidden;
        height: 100%;
        transition: 0.25s ease;
    }

    .client-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.14);
    }

    .client-top {
        background: linear-gradient(135deg, #111827, #312e81);
        color: white;
        padding: 20px;
    }

    .client-name {
        font-size: 1.35rem;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .client-phone {
        color: #dbeafe;
        font-size: 0.95rem;
    }

    .client-body {
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

    .btn-main {
        background: #111827;
        color: white;
        border-radius: 14px;
        font-weight: 800;
        padding: 11px 18px;
        border: none;
    }

    .btn-main:hover {
        background: #1f2937;
        color: white;
    }

    .btn-action {
        border-radius: 12px;
        font-weight: 700;
    }

    .empty-box {
        padding: 35px;
        text-align: center;
    }
</style>

<div class="mb-4">
    <a href="{{ route('garage.dashboard') }}" class="btn btn-outline-secondary rounded-pill fw-bold">
        ← Retour au menu
    </a>
</div>

<div class="clients-header d-flex justify-content-between align-items-center flex-wrap gap-3">
    <div>
        <h1>Clients</h1>

        <p>
            Gérez les propriétaires des véhicules suivis par le garage.
        </p>
    </div>

    <a href="{{ route('garage.clients.create') }}" class="btn btn-light fw-bold rounded-pill px-4 py-2">
        + Ajouter un client
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="search-card">
    <form method="GET" action="{{ route('garage.clients.index') }}" class="row g-3 align-items-center">
        <div class="col-md-9">
            <input type="text"
                   name="search"
                   class="form-control rounded-4 py-3"
                   placeholder="Rechercher par nom, prénom, téléphone ou email..."
                   value="{{ $search }}">
        </div>

        <div class="col-md-3 d-grid">
            <button type="submit" class="btn btn-main">
                Rechercher
            </button>
        </div>
    </form>
</div>

@if($clients->count() > 0)
    <div class="row g-4">
        @foreach($clients as $client)
            <div class="col-md-6 col-lg-4">
                <div class="client-card">
                    <div class="client-top">
                        <div class="client-name">
                            {{ $client->prenom }} {{ $client->nom }}
                        </div>

                        <div class="client-phone">
                            {{ $client->telephone }}
                        </div>
                    </div>

                    <div class="client-body">
                        <div class="info-line">
                            <span class="info-label">Email</span>
                            <span class="info-value">
                                {{ $client->email ?? 'Non renseigné' }}
                            </span>
                        </div>

                        <div class="info-line">
                            <span class="info-label">Adresse</span>
                            <span class="info-value">
                                {{ $client->adresse ?? 'Non renseignée' }}
                            </span>
                        </div>

                        <div class="info-line">
                            <span class="info-label">Véhicules</span>
                            <span class="info-value">
                                {{ $client->vehicules_count }}
                            </span>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-4">
                            <a href="{{ route('garage.clients.show', $client) }}" class="btn btn-outline-primary btn-sm btn-action">
                                Voir fiche
                            </a>

                            <a href="{{ route('garage.clients.edit', $client) }}" class="btn btn-outline-warning btn-sm btn-action">
                                Modifier
                            </a>

                            <form method="POST"
                                  action="{{ route('garage.clients.destroy', $client) }}"
                                  onsubmit="return confirm('Voulez-vous vraiment supprimer ce client ?');">
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
        {{ $clients->links() }}
    </div>
@else
    <div class="empty-box">
        <h4 class="fw-bold">Aucun client trouvé</h4>

        <p class="text-muted mb-3">
            Aucun client ne correspond à votre recherche.
        </p>

        <a href="{{ route('garage.clients.create') }}" class="btn btn-main">
            Ajouter un client
        </a>
    </div>
@endif
@endsection