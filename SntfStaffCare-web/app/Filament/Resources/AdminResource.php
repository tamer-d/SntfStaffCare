<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminResource\Pages;
use App\Filament\Resources\AdminResource\RelationManagers;
use App\Models\Admin;
use App\Enums\Wilaya;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'administrateur';
    protected static ?string $navigationGroup = 'Gestion des utilisateurs';
    protected static ?int $navigationSort = 1;
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('user.nom')
            ->label('Nom')
            ->required(),
            Forms\Components\TextInput::make('user.prenom')
            ->label('Prénom')
                ->required(),
            Forms\Components\TextInput::make('user.nomConjoint')
                ->label('Nom du Conjoint')
                ->nullable(),
            Forms\Components\TextInput::make('user.email')
                ->label('Email')
                ->required(),
            Forms\Components\TextInput::make('user.password')
                ->label('Mot de Passe')
                ->password() 
                ->required(),
            Forms\Components\TextInput::make('user.numTelephone')
                ->label('Numéro de Téléphone')
                ->tel()
                ->telRegex('/^(05|06|07)[0-9]{8}$/')
                ->required(),
            Forms\Components\TextInput::make('user.adresse')
                ->label('Adresse')
                ->nullable(),
            Forms\Components\Select::make('user.wilaya')
                ->label('Wilaya')
                ->options(Wilaya::asArray())
                ->searchable()
                ->nullable(),
            Forms\Components\Select::make('user.sex')
                ->label('Sex')
                ->options(['Homme' => 'Homme', 'Femme' => 'Femme'])
                ->required(),
            Forms\Components\DatePicker::make('user.dateNaissance')
                ->label('Date de Naissance')
                ->nullable(),
                Forms\Components\TextInput::make('user.lieuNaissance')
                    ->label('Lieu de Naissance')
                    ->nullable(),
            Forms\Components\Select::make('user.wilayaNaissance')
                ->label('Wilaya de naissance')
                ->options(Wilaya::asArray())
                ->searchable()
                ->nullable(),
                Forms\Components\Select::make('user.statut')
                ->label('Statut')
                ->options([
                    'Actif' => 'Actif',
                    'Inactif' => 'Inactif',
                ]),
            Forms\Components\Select::make('secteur_id')
                ->relationship('secteur', 'nom')
                ->required(),
            ])->columns(3);
    }


    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('secteur.nom')->label('Secteur'),
                Tables\Columns\TextColumn::make('user.nom')->label('Nom'),
                Tables\Columns\TextColumn::make('user.prenom')->label('Prénom'),
                Tables\Columns\TextColumn::make('user.email')->label('Email'),
                Tables\Columns\TextColumn::make('user.statut')->label('Statut'),
                Tables\Columns\TextColumn::make('created_at')->label('Créé le')->date(),
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
            'index' => Pages\ListAdmins::route('/'),
            'create' => Pages\CreateAdmin::route('/create'),
            'edit' => Pages\EditAdmin::route('/{record}/edit'),
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
