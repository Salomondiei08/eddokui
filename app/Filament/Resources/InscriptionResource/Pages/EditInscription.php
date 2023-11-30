<?php

namespace App\Filament\Resources\InscriptionResource\Pages;

use App\Filament\Resources\InscriptionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInscription extends EditRecord
{
    protected static string $resource = InscriptionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getTitle(): string
    {
        return static::$title ?? __('Modifier l\'inscription : '.$this->record->code);
    }
    protected function getBreadcrumbs(): array
    {
        return [
            route('filament.resources.inscriptions.index') => __('Inscriptions'),
            "#" => __('Modifier'),
        ];
    }
}
