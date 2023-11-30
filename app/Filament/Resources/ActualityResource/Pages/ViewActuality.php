<?php

namespace App\Filament\Resources\ActualityResource\Pages;

use App\Filament\Resources\ActualityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewActuality extends ViewRecord
{
    protected static string $resource = ActualityResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make()
            ->label('Modifier'),
        ];
    }

    protected function getTitle(): string
    {
        return static::$title ?? __('Détails sur l\'évènement : '.$this->record->title);
    }

    protected function getBreadcrumbs(): array
    {
        return [
            route('filament.resources.actualities.index') => __('Actualités'),
            "#" => __('Détails'),
        ];
    }
}
