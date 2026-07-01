<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Reparation;
use App\Models\Technicien;
use App\Models\Vehicule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Création des clients
        |--------------------------------------------------------------------------
        */

        $clients = Client::factory(40)->create();

        /*
        |--------------------------------------------------------------------------
        | Création des véhicules liés aux clients
        |--------------------------------------------------------------------------
        */

        $vehicules = Vehicule::factory(20)->make()->each(function ($vehicule) use ($clients) {
            $vehicule->client_id = $clients->random()->id;
            $vehicule->save();
        });

        /*
        |--------------------------------------------------------------------------
        | Création des techniciens ivoiriens
        |--------------------------------------------------------------------------
        */

        $noms = [
            "Kouassi", "Kouadio", "Koffi", "Konan", "Yao", "Kouamé", "N'Guessan", "N'Dri",
            "Ouattara", "Coulibaly", "Bamba", "Soro", "Traoré", "Aka", "Diabaté", "Bakayoko"
        ];

        $prenoms = [
            "Jean", "Emmanuel", "Donald", "Patrick", "Serge", "Awa", "Fatoumata"
        ];

        $specialites = [
            "Mécanique générale",
            "Diagnostic électronique",
            "Électricité automobile",
            "Climatisation automobile",
            "Freinage",
            "Pneumatique",
            "Carrosserie",
            "Peinture automobile",
            "Boîte de vitesse",
            "Suspension",
            "Entretien moteur",
            "Géométrie automobile"
        ];

        $techniciens = collect();
        $index = 0;

        foreach ($noms as $nom) {
            foreach ($prenoms as $prenom) {
                $techniciens->push(
                    Technicien::create([
                        "nom" => $nom,
                        "prenom" => $prenom,
                        "specialite" => $specialites[$index % count($specialites)],
                    ])
                );

                $index++;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Création des réparations liées aux véhicules et aux techniciens
        |--------------------------------------------------------------------------
        */

        Reparation::factory(60)->make()->each(function ($reparation) use ($vehicules, $techniciens) {
            $reparation->vehicule_id = $vehicules->random()->id;
            $reparation->duree_main_oeuvre = rand(1, 10);
            $reparation->save();

            $reparation->techniciens()->attach(
                $techniciens->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}