<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Film;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FilmResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FilmResource\RelationManagers;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\FilmResource\RelationManagers\ActorRelationManager;
use App\Filament\Resources\FilmResource\RelationManagers\CategoryRelationManager;

class FilmResource extends Resource
{
    protected static ?string $model = Film::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    protected static ?string $navigationGroup = 'Management Film';

    protected static ?int $navigationSort =2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                    Select::make('language_id')
                        ->relationship('languages','name')
                        ->preload()
                        ->searchable()
                        ->required(),
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('description')
                        ->required()
                        ->maxLength(65535)
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('release_years')
                        ->label('years')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('rental_duration')
                        ->label('Rental Duration (day)')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('rental_rate')
                        ->label('Rental Rate(RP)')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('length')
                        ->label('length (Minutes)')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('replacement_cost')
                        ->label('Replacement Cost (RP)')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('rating')
                        ->label('rating (0-10)')
                        ->required()
                        ->maxLength(255),
                    SpatieMediaLibraryFileUpload::make('special_features')
                        ->columnSpanFull(),
                ])
                ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('special_features')
                    ->label('Cover'),
                Tables\Columns\TextColumn::make('title')
                ->searchable(),
                Tables\Columns\TextColumn::make('languages.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('release_years')
                    ->sortable(),
                Tables\Columns\TextColumn::make('rental_duration')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('rental_rate')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('length')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('replacement_cost')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('rating')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ActorRelationManager::class,
           CategoryRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFilms::route('/'),
            'create' => Pages\CreateFilm::route('/create'),
            'edit' => Pages\EditFilm::route('/{record}/edit'),
        ];
    }
}
