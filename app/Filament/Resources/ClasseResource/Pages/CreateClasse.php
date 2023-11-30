<?php

namespace App\Filament\Resources\ClasseResource\Pages;

use App\Filament\Resources\ClasseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClasse extends CreateRecord
{
    protected static string $resource = ClasseResource::class;
    protected function getTitle(): string
    {
        return static::$title ?? __('Ajouter une classe ');
    }

   /*  protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('list', ['record' => $this->record]);
    } */
}
