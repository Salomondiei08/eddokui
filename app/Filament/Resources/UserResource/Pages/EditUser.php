<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

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
        return static::$title ?? __('Modifier l\'individu : '.$this->record->last_name .$this->record->first_name);
    }
    protected function getBreadcrumbs(): array
    {
        return [
            route('filament.resources.users.index') => __('Moniteurs'),
            "#" => __('Modifier'),
        ];
    }
}
