<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgenciaResource\Pages;
use App\Filament\Resources\AgenciaResource\RelationManagers;
use App\Models\Agencia;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class AgenciaResource extends Resource
{
    protected static ?string $model = Agencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')->required(),
                Forms\Components\TextInput::make('volumetrico')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->sortable(),
                Tables\Columns\TextColumn::make('volumetrico')->sortable()
                //
            ])
            ->filters([
                //
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
            'index' => Pages\ListAgencias::route('/'),
            'create' => Pages\CreateAgencia::route('/create'),
            'edit' => Pages\EditAgencia::route('/{record}/edit'),
        ];
    }
}
