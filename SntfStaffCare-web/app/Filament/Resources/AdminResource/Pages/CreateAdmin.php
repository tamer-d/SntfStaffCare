<?php

namespace App\Filament\Resources\AdminResource\Pages;

use App\Filament\Resources\AdminResource;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Filament\Resources\Pages\CreateRecord;

class CreateAdmin extends CreateRecord
{
    protected static string $resource = AdminResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Créer l'utilisateur
        $user = User::create([
            'nom' => $data['user']['nom'],
            'prenom' => $data['user']['prenom'],
            'nomConjoint' => $data['user']['nomConjoint'],
            'email' => $data['user']['email'],
            'numTelephone' => $data['user']['numTelephone'],
            'adresse' => $data['user']['adresse'],
            'wilaya' => $data['user']['wilaya'],
            'sex' => $data['user']['sex'],
            'dateNaissance' => $data['user']['dateNaissance'],
            'lieuNaissance' => $data['user']['lieuNaissance'],
            'wilayaNaissance' => $data['user']['wilayaNaissance'],
            'statut' => $data['user']['statut'],
            'password' => bcrypt($data['user']['password']),
            'role' => 'admin',
        ]);
        
        $data['user_id'] = $user->id;
        
        Admin::create([
            'user_id' =>  $data['user_id'],
            'secteur_id' => $data['secteur_id'], 
        ]);

        return $data;
    }

}