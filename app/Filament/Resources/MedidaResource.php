<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Medida;
use App\Models\Agencia;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use App\Filament\Resources\MedidaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MedidaResource\RelationManagers;

class MedidaResource extends Resource
{
    protected static ?string $model = Medida::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-square-bar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('agencia_id')
                    ->relationship('agencia', 'nombre')
                    ->getOptionLabelUsing(fn ($value): ?string => Agencia::find($value)?->id)
                    ->required(),
                Forms\Components\Group::make([
                    Forms\Components\TextInput::make('ancho')->required(),
                    Forms\Components\TextInput::make('largo')->required(),
                    Forms\Components\TextInput::make('alto')->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //Tables\Columns\TextColumn::make('agencia_id')->sortable(),
                Tables\Columns\TextColumn::make('agencia.nombre')->sortable(),
                Tables\Columns\TextColumn::make('ancho')->sortable(),
                Tables\Columns\TextColumn::make('largo')->sortable(),
                Tables\Columns\TextColumn::make('alto')->sortable(),
                //
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('agencia')->relationship('agencia', 'nombre')
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
            'index' => Pages\ListMedidas::route('/'),
            'create' => Pages\CreateMedida::route('/create'),
            'edit' => Pages\EditMedida::route('/{record}/edit'),
        ];
    }
}
