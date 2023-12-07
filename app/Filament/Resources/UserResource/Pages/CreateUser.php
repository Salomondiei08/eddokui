<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected function getTitle(): string
    {
        return static::$title ?? __('Ajouter un moniteur ');
    }

   /*  protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('list', ['record' => $this->record]);
    } */
}
