<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudent extends EditRecord
{
    protected static string $resource = StudentResource::class;

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
            route('filament.resources.students.index') => __('Enfants'),
            "#" => __('Modifier'),
        ];
    }
}
