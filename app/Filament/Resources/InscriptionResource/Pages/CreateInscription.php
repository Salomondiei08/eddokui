<?php

namespace App\Filament\Resources\InscriptionResource\Pages;

use App\Filament\Resources\InscriptionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInscription extends CreateRecord
{
    protected static string $resource = InscriptionResource::class;
    protected function getTitle(): string
    {
        return static::$title ?? __('Faire une insription ');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
