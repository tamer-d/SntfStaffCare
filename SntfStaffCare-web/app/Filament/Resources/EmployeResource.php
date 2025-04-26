<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Section;
use App\Filament\Resources\EmployeResource\Pages;
use App\Filament\Resources\EmployeResource\RelationManagers;
use App\Models\Employe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeResource extends Resource
{
    protected static ?string $model = Employe::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Employees';
    protected static ?string $navigationGroup = 'Gestion des utilisateurs';
    protected static ?int $navigationSort = 3;


    public static function form(Form $form): Form
    {
    return $form
        ->schema([
            Section::make('Informations personnelles')
                ->schema([
                    TextInput::make('user.nom')
                        ->required(),

                    TextInput::make('user.prenom')
                        ->required(),

                    TextInput::make('user.nomConjoint'),

                    TextInput::make('user.email')
                        ->email()
                        ->required(),

                    TextInput::make('user.numTelephone')
                        ->tel(),

                    DatePicker::make('user.dateNaissance'),

                    TextInput::make('user.lieuNaissance'),

                    Select::make('user.wilayaNaissance')
                        ->options(Wilaya::class)
                        ->searchable(),

                    Textarea::make('user.adresse'),

                    Select::make('user.wilaya')
                        ->options(Wilaya::class)
                        ->searchable(),

                    Select::make('user.sexe')
                        ->options([
                            'homme' => 'Homme',
                            'femme' => 'Femme',
                        ]),

                    TextInput::make('user.motDePasse')
                        ->password()
                        ->dehydrated(fn ($state) => filled($state))
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                        ->required(fn (string $context) => $context === 'create'),

                    Select::make('user.statut')
                        ->options([
                            'actif' => 'Actif',
                            'inactif' => 'Inactif',
                        ]),
                ]),

            Section::make('Informations professionnelles')
                ->schema([
                    TextInput::make('matricule')->required(),
                    TextInput::make('poste')->required(),

                    Select::make('departement_id')
                        ->relationship('departement', 'nom')
                        ->required(),

                    Select::make('situationFamille')
                        ->options([
                            'celibataire' => 'Célibataire',
                            'marie' => 'Marié(e)',
                            'divorce' => 'Divorcé(e)',
                            'veuf' => 'Veuf(ve)',
                        ]),

                    Select::make('groupeSanguin')
                        ->options([
                            'A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O'
                        ]),

                    Select::make('rh')
                        ->options([
                            '+' => 'Rh+',
                            '-' => 'Rh-',
                        ]),

                    TextInput::make('formationScolaire'),
                    TextInput::make('formationProfessionnelle'),
                    TextInput::make('qualificationProfessionnelle'),
                    TextInput::make('serviceNational'),
                    TextInput::make('numSecuSocial'),
                ]),
        ]);
}

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployes::route('/'),
            'create' => Pages\CreateEmploye::route('/create'),
            'edit' => Pages\EditEmploye::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
