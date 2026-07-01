<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    public function definition(): array
    {
        $noms = [
            'Kouassi', 'Kouadio', 'Koffi', 'Konan', 'Yao',
            'Kouamé', "N'Guessan", "N'Dri", 'Ouattara', 'Coulibaly',
            'Bamba', 'Soro', 'Traoré', 'Aka', 'Diabaté', 'Bakayoko',
            'Fofana', 'Touré', 'Cissé', 'Diarra'
        ];

        $prenoms = [
            'Jean', 'Emmanuel', 'Donald', 'Patrick', 'Serge',
            'Awa', 'Fatoumata', 'Mariam', 'Aminata', 'Christelle',
            'Yves', 'Stéphane', 'Arnaud', 'Didier', 'Nadine',
            'Carole', 'Prisca', 'Wilfried', 'Kevin', 'Judith'
        ];

        $communes = [
            'Cocody',
            'Yopougon',
            'Marcory',
            'Treichville',
            'Abobo',
            'Adjamé',
            'Koumassi',
            'Plateau',
            'Bingerville',
            'Angré',
            'Riviera',
            'Port-Bouët'
        ];

        return [
            'nom' => $this->faker->randomElement($noms),
            'prenom' => $this->faker->randomElement($prenoms),
            'telephone' => '07' . $this->faker->unique()->numerify('########'),
            'email' => $this->faker->unique()->safeEmail(),
            'adresse' => $this->faker->randomElement($communes) . ', Abidjan',
        ];
    }
}