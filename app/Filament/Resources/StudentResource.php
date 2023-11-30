<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Student;
use Filament\Resources\Form;
use Closure as GlobalClosure;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\StudentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\StudentResource\RelationManagers;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('type_parent', 'enfant')->count();
    }
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'ED';
    protected static ?string $navigationLabel = 'Enfants';

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

                Select::make('sex')
                ->label('Genre')
                ->options([
                    'M' => 'Masculin',
                    'F' => 'Féminin',
                ]),

                Radio::make('habita')
                ->label('Habitez-vous avec vos parent')
                ->options([
                    'OUI' => 'Oui',
                    'NON' => 'Non'
                ])
                ->inline(),

                TextInput::make('address')
                ->label('Lieu d\'habitation')
                ->maxLength(255),

                TextInput::make('phone')
                ->label('Téléphone')
                ->maxLength(255),

                TextInput::make('email')
                ->label('Email')
                ->email()
                ->unique(ignoreRecord: true)
                ->required()
                ->maxLength(255),

                DateTimePicker::make('birth_at')
                ->displayFormat('d-m-Y H:i')
                ->label('Date de naissance')
                ->required(),

                TextInput::make('birth_place')
                ->label('Lieu de naissance')
                ->maxLength(255),

                Select::make('activity_group')
                ->label('Groupe d\'activité')
                ->options([
                    'Théatre' => 'Théatre',
                    'Groupe Musicale' => 'Musicale',
                    'Slam/Poème' => 'Slam/Poème',
                    'Groupe Biblique' => 'Groupe Biblique',
                    'Aucun' => 'Aucun',
                ]),

                DateTimePicker::make('date_enter')
                ->displayFormat('d-m-Y H:i')
                ->label('Date d\'entrée à l\'ED')
                ->required(),

                Radio::make('orph')
                ->label('Habitez-vous avec vos parent')
                ->options([
                    '1' => 'Oui',
                    '0' => 'Non'
                ])
                ->inline(),



                SpatieMediaLibraryFileUpload::make('image')
                ->label('Photo de profil')
                ->collection('image')
                ->image(),
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

                TextColumn::make('all_name')
                ->label('Nom & Prénoms')
                ->wrap()
                ->searchable(['first_name', 'last_name'])
                ->sortable(),

                TextColumn::make('activity_group')
                ->label('Groupe d\'activité')
                ->wrap()
                ->searchable()
                ->sortable(),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'view' => Pages\ViewStudent::route('/{record}'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('type_parent', 'enfant')
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
