<?php

namespace App\Filament\Resources\InscriptionResource\Pages;

use App\Filament\Resources\InscriptionResource;
use App\Filament\Resources\InscriptionResource\Widgets\Paiement;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInscriptions extends ListRecords
{
    protected static string $resource = InscriptionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Faire une inscription')
            ->icon('heroicon-s-plus-circle')
            ->color('success'),
        ];
    }

    protected function getTitle(): string
    {
        return static::$title ?? __('Liste des inscrits');
    }

    protected function getBreadcrumbs(): array
    {
        return [
            "#" => __('Inscriptions'),

        ];
    }
}
