@extends('base')

@section('title', 'Techniciens - Garage 2KYD')

@section('content')
<style>
    .page-header-techniciens {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        border-radius: 24px;
        padding: 38px 32px;
        box-shadow: 0 15px 35px rgba(16, 185, 129, 0.22);
        margin-bottom: 30px;
    }

    .page-header-techniciens h1 {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .page-header-techniciens p {
        font-size: 1.08rem;
        margin-bottom: 0;
        color: rgba(255, 255, 255, 0.92);
    }

    .btn-create-technicien {
        background: white;
        color: #047857;
        border: none;
        border-radius: 14px;
        padding: 13px 22px;
        font-weight: 800;
    }

    .btn-create-technicien:hover {
        background: #ecfdf5;
        color: #065f46;
    }

    .technicien-card {
        border: none;
        border-radius: 22px;
        background: white;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
        transition: 0.25s ease;
        height: 100%;
    }

    .technicien-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 38px rgba(15, 23, 42, 0.13);
    }

    .technicien-card-top {
        background: linear-gradient(90deg, #111827, #1f2937);
        color: white;
        padding: 20px 22px;
        text-align: center;
    }

    .avatar-technicien {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: linear-gradient(135deg, #10b981, #34d399);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 12px auto;
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.25);
    }

    .technicien-name {
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 0;
    }

    .technicien-body {
        padding: 24px 22px;
        text-align: center;
    }

    .section-label {
        font-size: 0.85rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #6b7280;
        margin-bottom: 8px;
    }

    .specialite-box {
        background: #ecfdf5;
        color: #047857;
        border: 1px solid #a7f3d0;
        border-radius: 999px;
        padding: 9px 14px;
        font-weight: 800;
        display: inline-block;
        margin-bottom: 18px;
    }

    .reparation-count {
        background: #eff6ff;
        color: #2563eb;
        border: 1px solid #bfdbfe;
        border-radius: 999px;
        padding: 9px 14px;
        font-weight: 800;
        display: inline-block;
    }

    .technicien-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        margin-top: 22px;
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
        box-shadow: 0 10px 25px rgba(0,0,0,0.06);
        color: #6b7280;
    }
</style>

<div class="mb-4">
    <a href="{{ route('garage.dashboard') }}" class="btn btn-outline-secondary rounded-pill fw-bold">
        ← Retour au menu
    </a>
</div>

<div class="page-header-techniciens">
    <div class="row align-items-center g-4">
        <div class="col-lg-8">
            <h1>Gestion des techniciens</h1>

            <p>
                Consultez, ajoutez, modifiez et supprimez les techniciens du Garage 2KYD.
            </p>
        </div>

        <div class="col-lg-4 text-lg-end">
            <a href="{{ route('garage.techniciens.create') }}" class="btn btn-create-technicien">
                + Ajouter un technicien
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
        {{ session('success') }}
    </div>
@endif

@if($techniciens->isEmpty())
    <div class="empty-box">
        <h4 class="fw-bold mb-2">Aucun technicien enregistré</h4>

        <p class="mb-0">
            Cliquez sur “Ajouter un technicien” pour enregistrer un nouveau technicien.
        </p>
    </div>
@else
    <div class="row g-4">
        @foreach($techniciens as $technicien)
            <div class="col-md-6 col-xl-4">
                <div class="technicien-card">
                    <div class="technicien-card-top">
                        <div class="avatar-technicien">
                            👨‍🔧
                        </div>

                        <p class="technicien-name">
                            {{ $technicien->prenom }} {{ $technicien->nom }}
                        </p>
                    </div>

                    <div class="technicien-body">
                        <div class="section-label">
                            Spécialité
                        </div>

                        <div class="specialite-box">
                            {{ $technicien->specialite }}
                        </div>

                        <div class="section-label">
                            Réparations associées
                        </div>

                        <div class="reparation-count">
                            {{ $technicien->reparations_count }} réparation(s)
                        </div>

                        <div class="technicien-actions">
                            <a href="{{ route('garage.techniciens.edit', $technicien) }}"
                               class="btn btn-action-edit">
                                Modifier
                            </a>

                            <form method="POST"
                                  action="{{ route('garage.techniciens.destroy', $technicien) }}"
                                  onsubmit="return confirm('Voulez-vous vraiment supprimer ce technicien ?');">
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
        {{ $techniciens->links() }}
    </div>
@endif
@endsection