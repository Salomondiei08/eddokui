<?php

namespace App\Filament\Resources;

use AlperenErsoy\FilamentExport\Actions\FilamentExportHeaderAction;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Parameter;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;
use Phpsa\FilamentPasswordReveal\Password;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

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
    protected static ?string $navigationGroup = 'ED';
    protected static ?string $navigationLabel = 'Moniteurs';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('last_name')
            ->label('Nom')
            ->required()
            ->maxLength(255),

            TextInput::make('first_name')
            ->label('Prénoms')
            ->maxLength(255),

            TextInput::make('email')
            ->label('Email')
            ->email()
            ->unique(ignoreRecord: true)
            ->required()
            ->maxLength(255),

            Password::make('password')
            ->password()
            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
            ->required()

            ->visibleOn('create'),

            Select::make('roles')
            ->relationship('roles', 'name', function (Builder $query) {
                //$query->whereIn('name', auth()->user()->roles->pluck('name')->toArray());
                return $query->when(!auth()->user()->hasRole(['super_admin']), function($q){
                    if (auth()->user()->hasRole(['admin'])) {
                        $q->whereNotIn('name', ['super_admin']);
                    }
                    else {
                        $q->whereIn('name', auth()->user()->roles->pluck('name')->toArray());
                    }
                })
                /* ->when(auth()->user()->hasRole(['admin']), function($q){
                    $q->whereNotIn('name', ['super_admin']);
                }) */;
            })
            ->options(
                Role::when(!auth()->user()->hasRole(['super_admin']), function($q){
                    if (auth()->user()->hasRole(['admin'])) {
                        $q->whereNotIn('name', ['super_admin']);
                    }
                    else {
                        $q->whereIn('name', auth()->user()->roles->pluck('name')->toArray());
                    }
                })
                /* ->when(auth()->user()->hasRole(['admin']), function($q){
                    $q->whereNotIn('name', ['super_admin']);
                }) */
                ->get()
                ->pluck('name', 'id')
            )
            ->multiple()
            ->required(),

            TextInput::make('phone')
            ->label('Téléphone')
            ->maxLength(255),

            SpatieMediaLibraryFileUpload::make('image')
            ->label('Photo de profil')
            ->collection('image')
            ->image(),

            TextInput::make('address')
            ->label('Adresse')
            ->maxLength(255),

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

                TextColumn::make('fullname')
                ->label('Nom & Prénoms')
                ->wrap()
                ->searchable(['first_name', 'last_name'])
                ->sortable(),

                TextColumn::make('roles.name')
                ->label('Classe')
                ->wrap()
                ->searchable()
                ->sortable(),

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
                Tables\Actions\ForceDeleteAction::make()
                ->label(''),
                Tables\Actions\RestoreAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->when(!auth()->user()->hasRole(['super_admin']), function (Builder $query) {
                $query->whereHas('roles', function (Builder $query) {
                    $query->where('name', '!=', 'super_admin');
                });
            })
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
