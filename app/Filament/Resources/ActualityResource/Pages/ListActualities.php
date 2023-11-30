<?php

namespace App\Filament\Resources\ActualityResource\Pages;

use App\Filament\Resources\ActualityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActualities extends ListRecords
{
    protected static string $resource = ActualityResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Ajouter un évènement')
            ->icon('heroicon-s-plus-circle')
            ->color('success'),
        ];
    }

    protected function getTitle(): string
    {
        return static::$title ?? __('Liste des évènements ajoutés');
    }

    protected function getBreadcrumbs(): array
    {
        return [
            "#" => __('Actualités'),

        ];
    }
}
