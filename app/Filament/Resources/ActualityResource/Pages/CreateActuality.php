<?php

namespace App\Filament\Resources\ActualityResource\Pages;

use App\Filament\Resources\ActualityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateActuality extends CreateRecord
{
    protected static string $resource = ActualityResource::class;

    protected function getTitle(): string
    {
        return static::$title ?? __('Ajouter un évènement ');
    }

   /*  protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('list', ['record' => $this->record]);
    } */
}
