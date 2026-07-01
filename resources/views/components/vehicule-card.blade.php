<div class="col-md-6 col-lg-4">
    <div class="card h-100 shadow-sm border-0">
        <div class="card-header bg-dark text-white">
            <strong>{{ $vehicule->immatriculation }}</strong>
        </div>

        <div class="card-body">
            <h5 class="card-title">
                {{ $vehicule->marque }} {{ $vehicule->modele }}
            </h5>

            <p class="card-text text-muted mb-2">
                <strong>Couleur :</strong> {{ $vehicule->couleur }}<br>
                <strong>Année :</strong> {{ $vehicule->annee }}<br>
                <strong>Kilométrage :</strong> {{ number_format($vehicule->kilometrage, 0, ',', ' ') }} km<br>
                <strong>Énergie :</strong> {{ $vehicule->energie }}<br>
                <strong>Boîte :</strong> {{ $vehicule->boite }}
            </p>

            <span class="badge bg-primary">
                {{ $vehicule->reparations_count }} réparation(s)
            </span>
        </div>

        <div class="card-footer bg-white">
            <div class="d-grid gap-2">
                <a href="{{ route('garage.vehicules.show', $vehicule) }}"
                   class="btn btn-outline-dark btn-sm">
                    Voir le détail
                </a>

                <a href="{{ route('garage.vehicules.edit', $vehicule) }}"
                   class="btn btn-outline-primary btn-sm">
                    Modifier
                </a>

                <form method="POST"
                      action="{{ route('garage.vehicules.destroy', $vehicule) }}"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer ce véhicule ?');">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>