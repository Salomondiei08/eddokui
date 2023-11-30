<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    protected function getActions(): array
    {
        return [
            //Actions\EditAction::make(),
        ];
    }
    protected function getTitle(): string
    {
        return static::$title ?? __('Message de : '.$this->record->name);
    }

    protected function getBreadcrumbs(): array
    {
        return [
            route('filament.resources.contacts.index') => __('Messages'),
            "#" => __('Détails'),
        ];
    }
}
