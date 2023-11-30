<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Inscription;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput\Mask;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InscriptionResource\Pages;
use App\Filament\Resources\InscriptionResource\RelationManagers;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class InscriptionResource extends Resource
{
    protected static ?string $model = Inscription::class;

    protected static ?string $navigationIcon = 'heroicon-o-database';
    protected static ?string $navigationGroup = 'ED';
    protected static ?string $navigationLabel = 'Inscription';

    protected static function getNavigationBadge(): ?string
    {
        //return static::getModel()::count();
        if (auth()->user()->hasRole(['admin', 'super_admin'])) {
            return static::getModel()::count();
        }
        else{
            return null;
        }
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('student_id')
                    ->label('Enfant')
                ->relationship('student', 'all_name', fn (Builder $query) => $query->where('type_parent','enfant')),

                Select::make('classe_id')
                ->label('Classe')
                ->relationship('classe', 'title'),

                RichEditor::make('content')
                ->label('Description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.all_name')
                ->label('Nom & Prénoms')
                ->searchable()
                ->sortable(),

               TextColumn::make('classe.title')
                ->label('Classe')
                ->searchable()
                ->sortable(),

                BadgeColumn::make('montant')
                ->colors([
                    'success',
                ])
                ->label('Solde')
                ->searchable()
                ->sortable()
                ->money('xof')
                ->visibleFrom('md'),

            ])
            ->filters([
                SelectFilter::make('Tri par classe')
                ->relationship('classe', 'title'),

                Filter::make('created_at')
                ->form([
                    Forms\Components\DatePicker::make('created_from')->label('Du'),
                    Forms\Components\DatePicker::make('created_until')->label('Au'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                }),

                    Tables\Filters\TrashedFilter::make(),
                ])


            ->actions([


            ActionGroup::make([
                Tables\Actions\ViewAction::make()
                ->label('Voir'),
                Tables\Actions\EditAction::make()
                ->label('Modifier'),
                // Bouton pour ajouter ligne budgétaire
                Action::make('paiement_add')
                    ->label('Effectuer un paiement')
                    ->color('warning')
                    ->icon('heroicon-o-plus-circle')
                    ->action(function (Inscription $record){
                        //dd($record->title);
                        Notification::make()
                        ->title('Paiement effectué avec succès')
                        ->success()
                        ->duration(5000)
                        ->send();
                        return $record;
                    })
                    /* ->before(function (Inscription $record) {
                        dd($record->toArray());
                    }) */
                    ->after(function (Inscription $record) {
                        $montant = $record->paiements->sum('montant');
                        //dd($montant);
                        $record->update([
                            'montant' => $montant,
                        ]);
                        //Mail::to('tech@qenium.com')->send(new BudgetMail($record));
                    })
                    //->action(fn (Inscription $record) => $record)
                    ->mountUsing(fn (ComponentContainer $form, Inscription $record) => $form->fill([
                        'title' => $record->title,
                    ]))

                    ->form([
                        Placeholder::make('title')
                        ->label('')
                        ->content(fn (Inscription  $record) => 'Paiement de frais de scolarité "'.$record->code.'"'),

                        Repeater::make('paiements')
                        ->label('')
                        ->relationship()
                        ->defaultItems(1)
                        ->minItems(1)
                        ->createItemButtonLabel('Ajouter un versement')
                        ->schema([
                            Grid::make(2)->schema([
                                Select::make('moy_paie')
                                ->label('Moyen de paiement')
                                ->options([
                                    'Espece' => 'Espece',
                                    'Cheque' => 'Cheque',
                                    'Orange Money' => 'Orange Money',
                                    'Mtn Money' => 'Mtn Money',
                                    'Wave' => 'Wave',
                                ])
                                ->required(),

                                TextInput::make('montant')
                                ->label('Montant')
                                ->numeric()
                                ->minValue(0)
                                ->mask(fn (Mask $mask) => $mask
                                    ->numeric()
                                    ->decimalPlaces(2) // Set the number of digits after the decimal point.
                                    ->decimalSeparator(',') // Add a separator for decimal numbers.
                                    ->minValue(0) // Set the minimum value that the number can be.
                                    ->thousandsSeparator(' '), // Add a separator for thousands.
                                )
                                ->required(),
                            ])
                        ])
                        ->reactive()
                    ])
                    //->deselectRecordsAfterCompletion()
                    //->requiresConfirmation()
                    ->modalHeading('Paiement')
                    //->modalSubheading('Ajouter ')
                    //->modalButton('Co')
                    //->visible(fn (Inscription $record) => (in_array($record->step_id, [27])) and auth()->user()->hasPermissionTo('budget_add_Inscription')),

            ]),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInscriptions::route('/'),
            'create' => Pages\CreateInscription::route('/create'),
            'view' => Pages\ViewInscription::route('/{record}'),
            'edit' => Pages\EditInscription::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
