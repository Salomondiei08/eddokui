<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

    protected function getActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
    protected function getTitle(): string
    {
        return static::$title ?? __('Liste des messages réçus');
    }

    protected function getBreadcrumbs(): array
    {
        return [
            "#" => __('Messages'),
        ];
    }
}
