<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

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
            route('filament.resources.users.index') => __('Moniteurs'),
            "#" => __('Détails'),
        ];
    }
}
