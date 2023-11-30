<?php

namespace App\Filament\Resources\InscriptionResource\Pages;

use App\Filament\Resources\InscriptionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInscription extends ViewRecord
{
    protected static string $resource = InscriptionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
    protected function getTitle(): string
    {
        return static::$title ?? __('Détails sur l\'inscription : '.$this->record->code);
    }

    protected function getBreadcrumbs(): array
    {
        return [
            route('filament.resources.inscriptions.index') => __('Inscriptions'),
            "#" => __('Détails'),
        ];
    }
}
