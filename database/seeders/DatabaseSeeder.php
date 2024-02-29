<?php

namespace Database\Seeders;

use App\Models\Assignation;
use App\Models\Fonction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Fonction::create([
            'code' => 'ADM',
            'libelle' => 'Administrateur',
        ]);

        User::create([
            'username' => 'Admin',
            'name' => 'Admin Administrateur',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('00000000'),
        ]);

        Assignation::create([
            'user_id' => 1,
            'fonction_id' => 1,
            'date_debut' => date('Y-m-d'),
            'date_fin' => date('Y-m-d'),
        ]);

        Fonction::create([
            'code' => 'GES',
            'libelle' => 'Gestionnaire',
        ]);

        User::create([
            'username' => 'Gestion',
            'name' => 'Gestion Gestionnaire',
            'email' => 'gestion@gmail.com',
            'password' => Hash::make('00000000'),
        ]);

        Assignation::create([
            'user_id' => 2,
            'fonction_id' => 2,
            'date_debut' => date('Y-m-d'),
            'date_fin' => date('Y-m-d'),
        ]);

        Fonction::create([
            'code' => 'OBS',
            'libelle' => 'Observateur',
        ]);

        User::create([
            'username' => 'Observateur',
            'name' => 'Observ Observateur',
            'email' => 'observateur@gmail.com',
            'password' => Hash::make('00000000'),
        ]);

        Assignation::create([
            'user_id' => 3,
            'fonction_id' => 3,
            'date_debut' => date('Y-m-d'),
            'date_fin' => date('Y-m-d'),
        ]);

        
    }
}
