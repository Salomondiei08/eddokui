<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentResource::class;

    protected function getActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }

    protected function getTitle(): string
    {
        return static::$title ?? __('Liste des enfants enrégistrés');
    }

    protected function getBreadcrumbs(): array
    {
        return [
            "#" => __('Enfants'),

        ];
    }
}
