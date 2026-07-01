<?php

namespace Database\Factories;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReparationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'vehicule_id' => null,
            'date' => $this->faker->dateTimeBetween('-6 months', '+1 month')->format('Y-m-d'),
            'duree_main_oeuvre' => $this->faker->randomFloat(2, 1, 12),
            'objet_reparation' => $this->faker->randomElement([
                'Vidange moteur et remplacement du filtre à huile',
                'Réparation du système de freinage',
                'Diagnostic électronique complet',
                'Remplacement de la batterie',
                'Réparation de la climatisation',
                'Changement des pneus',
                'Révision générale du véhicule',
                'Remplacement des amortisseurs',
                'Réparation de la boîte de vitesse',
                'Contrôle et réparation du circuit électrique'
            ]),
        ];
    }
}