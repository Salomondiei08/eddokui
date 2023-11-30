<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStudent extends ViewRecord
{
    protected static string $resource = StudentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make()
            ->label('Modifier'),
        ];
    }
    protected function getTitle(): string
    {
        return static::$title ?? __('Détails sur l\'individu : '.$this->record->last_name .$this->record->first_name);
    }

    protected function getBreadcrumbs(): array
    {
        return [
            route('filament.resources.students.index') => __('Enfants'),
            "#" => __('Détails'),
        ];
    }
}
