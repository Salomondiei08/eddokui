<?php

namespace App\Filament\Resources\ActualityResource\Pages;

use App\Filament\Resources\ActualityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActuality extends EditRecord
{
    protected static string $resource = ActualityResource::class;

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
        return static::$title ?? __('Modifier l\'évènément : '.$this->record->title);
    }
    protected function getBreadcrumbs(): array
    {
        return [
            route('filament.resources.actualities.index') => __('Actualités'),
            "#" => __('Modifier'),
        ];
    }
}
