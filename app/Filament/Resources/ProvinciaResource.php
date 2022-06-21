<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProvinciaResource\Pages;
use App\Filament\Resources\ProvinciaResource\RelationManagers;
use App\Models\Provincia;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProvinciaResource extends Resource
{
    protected static ?string $model = Provincia::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')->required(),
                // Forms\Components\TextInput::make('siglas')->required(),
                // Forms\Components\TextInput::make('codigo_postal')->required(),
                // Forms\Components\TextInput::make('codigo_telefonico')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->sortable(),
                // Tables\Columns\TextColumn::make('siglas')->sortable(),
                // Tables\Columns\TextColumn::make('codigo_postal')->sortable(),
                // Tables\Columns\TextColumn::make('codigo_telefonico')->sortable(),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProvincias::route('/'),
            'create' => Pages\CreateProvincia::route('/create'),
            'edit' => Pages\EditProvincia::route('/{record}/edit'),
        ];
    }
}
