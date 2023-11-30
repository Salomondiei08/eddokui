<?php

namespace App\Filament\Resources\InscriptionResource\Widgets;

use App\Filament\Resources\InscriptionResource;
use Faker\Provider\Base;
use App\Models\Inscription;
use Filament\Widgets\Widget;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Widgets\TableWidget as BaseWidget;

class Paiement extends BaseWidget
{
    //protected static string $view = 'filament.resources.inscription-resource.widgets.paiement';
    protected function getTitle(): string
    {
        return __('Paiement');
    }
    protected static ?string $heading = 'Gestion inscription';
    protected static ?string $pollingInterval = '150s';
    protected function getWidgets(): array
    {
        return [
            //Filament::getWidgets(),
            Paiement::class,
        ];
    }
    protected static ?int $sort = 2;

    protected function getColumns(): int | array
    {
        return 1;
    }

    public function getDefaultTableRecordsPerPageSelectOption(): int
    {
        return 15;
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'created_at';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }

    protected function getTableQuery(): Builder
    {
        /* return Inscription::query()
        ->when(auth()->user()->hasRole(['super_admin']), function($q){
            $q->whereHas('user', function ($q){
                $q->whereUser_id(auth()->user()->id);
            });
        }); */
        return InscriptionResource::getEloquentQuery();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('student.all_name')
            ->label('Nom & Prénoms')
            ->searchable()
            ->sortable(),

           TextColumn::make('classe.title')
            ->label('Classe')
            ->searchable()
            ->sortable(),

            BadgeColumn::make('total_paiement')
            ->colors([
                'warning'
            ])
            ->label('Solde')
            ->searchable()
            ->sortable()
            ->money('xof')
            ->visibleFrom('md'),
        ];
    }
}
