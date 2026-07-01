<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'immatriculation' => strtoupper($this->faker->unique()->bothify('CI-####-??')),
            'marque' => $this->faker->randomElement([
                'Toyota',
                'Hyundai',
                'Kia',
                'Peugeot',
                'Renault',
                'Mercedes',
                'Nissan',
                'Ford'
            ]),
            'modele' => $this->faker->randomElement([
                'Corolla',
                'Tucson',
                'Sportage',
                '308',
                'Clio',
                'Classe C',
                'Qashqai',
                'Focus'
            ]),
            'couleur' => $this->faker->randomElement([
                'Noir',
                'Blanc',
                'Gris',
                'Rouge',
                'Bleu',
                'Argent'
            ]),
            'annee' => $this->faker->numberBetween(2010, 2025),
            'kilometrage' => $this->faker->numberBetween(10000, 250000),
            'carrosserie' => $this->faker->randomElement([
                'Berline',
                'SUV',
                'Citadine',
                'Pickup',
                'Break'
            ]),
            'energie' => $this->faker->randomElement([
                'Essence',
                'Diesel',
                'Hybride',
                'Électrique'
            ]),
            'boite' => $this->faker->randomElement([
                'Manuelle',
                'Automatique'
            ]),
        ];
    }
}