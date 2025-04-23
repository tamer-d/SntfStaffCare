<?php

namespace App\Filament\Resources\CmsResource\Pages;

use App\Filament\Resources\CmsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCms extends ListRecords
{
    protected static string $resource = CmsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
