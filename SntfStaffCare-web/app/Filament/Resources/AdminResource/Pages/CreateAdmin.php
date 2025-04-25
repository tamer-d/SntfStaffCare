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
            'role' => 'admin', // Définir le rôle comme admin
        ]);

         $data['user_id'] = $user->id;

        return $data;
    }

    protected function afterCreate(): void
    {
        // Récupérer l'état du formulaire
        $state = $this->form->getState();

        // Assurez-vous que user_id est disponible
        if (isset($state['user_id'])) {
            Admin::create([
                'user_id' => $state['user_id'], // Utilisez l'état du formulaire ici
                'secteur_id' => $state['secteur_id'],
            ]);
        } else {
            // Gérer l'erreur si user_id est indéfini
            throw new \Exception("user_id is not defined.");
        }
    }
}