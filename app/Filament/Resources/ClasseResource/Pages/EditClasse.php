<?php

namespace App\Filament\Resources\ClasseResource\Pages;

use App\Filament\Resources\ClasseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClasse extends EditRecord
{
    protected static string $resource = ClasseResource::class;

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
        return static::$title ?? __('Modifier la classe : '.$this->record->title);
    }
    protected function getBreadcrumbs(): array
    {
        return [
            route('filament.resources.classes.index') => __('Classes'),
            "#" => __('Modifier'),
        ];
    }
}
