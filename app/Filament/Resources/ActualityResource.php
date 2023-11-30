<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Pages\Page;
use App\Models\Actuality;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ActualityResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\ActualityResource\RelationManagers;
use App\Filament\Resources\ActualityResource\Pages\CreateActuality;

class ActualityResource extends Resource
{
    protected static ?string $model = Actuality::class;

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';

    protected static ?string $navigationLabel = 'Actualités';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Nom de l\'évènement')
                    ->required(fn (Page $livewire) => ($livewire instanceof CreateActuality))
                    ->maxLength(255),

                TextInput::make('subtitle')
                    ->label('Sous-titre')
                    ->maxLength(255),

                RichEditor::make('content')
                    ->label('Description'),

                SpatieMediaLibraryFileUpload::make('image')
                    ->label('Images')
                    ->collection('image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->label('Photo')
                    ->collection('image')
                    ->circular()
                    ->width(25)
                    ->height(25)
                    ->toggleable(),

                TextColumn::make('title')
                    ->label('Nom de l\'évènement')
                    ->searchable()
                    ->sortable(),

                ToggleColumn::make('status')
                    ->label('Poster')
                    ->toggleable(),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label(''),
                Tables\Actions\EditAction::make()
                    ->label(''),
                Tables\Actions\DeleteAction::make()
                    ->label(''),
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
            'index' => Pages\ListActualities::route('/'),
            'create' => Pages\CreateActuality::route('/create'),
            'view' => Pages\ViewActuality::route('/{record}'),
            'edit' => Pages\EditActuality::route('/{record}/edit'),
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
