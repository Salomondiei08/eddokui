<?php

namespace App\Filament\Resources\ClasseResource\Pages;

use App\Filament\Resources\ClasseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClasse extends ViewRecord
{
    protected static string $resource = ClasseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
    protected function getTitle(): string
    {
        return static::$title ?? __('Détails sur la classe : '.$this->record->title);
    }

    protected function getBreadcrumbs(): array
    {
        return [
            route('filament.resources.classes.index') => __('Classses'),
            "#" => __('Détails'),
        ];
    }
}
