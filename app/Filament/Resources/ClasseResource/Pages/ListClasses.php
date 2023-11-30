<?php

namespace App\Filament\Resources\ClasseResource\Pages;

use App\Filament\Resources\ClasseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClasses extends ListRecords
{
    protected static string $resource = ClasseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Ajouter une classe')
            ->icon('heroicon-s-plus-circle')
            ->color('success'),
        ];
    }
    protected function getTitle(): string
    {
        return static::$title ?? __('Liste des classes ajoutées');
    }

    protected function getBreadcrumbs(): array
    {
        return [
            "#" => __('Classes'),

        ];
    }
}
