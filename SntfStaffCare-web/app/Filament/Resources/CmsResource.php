<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CmsResource\Pages;
use App\Filament\Resources\CmsResource\RelationManagers;
use App\Models\Cms;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CmsResource extends Resource
{
    protected static ?string $model = Cms::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationLabel = 'Centres médico-sociaux';
    protected static ?string $modelLabel = 'CMS';
    protected static ?string $navigationGroup = 'gestion du système';
    protected static ?int $navigationSort = 3;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')
                    ->required()
                    ->maxLength(255),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCms::route('/'),
            'create' => Pages\CreateCms::route('/create'),
            'edit' => Pages\EditCms::route('/{record}/edit'),
        ];
    }
}
