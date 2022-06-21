<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Peso;
use Filament\Tables;
use App\Models\Agencia;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PesoResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PesoResource\RelationManagers;

class PesoResource extends Resource
{
    protected static ?string $model = Peso::class;

    protected static ?string $navigationIcon = 'heroicon-o-scale';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('agencia_id')
                    ->relationship('agencia', 'nombre')
                    ->getOptionLabelUsing(fn ($value): ?string => Agencia::find($value)?->id),
                Forms\Components\TextInput::make('tramo_peso')->required()->label('Peso')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('agencia.nombre')->sortable(),
                Tables\Columns\TextColumn::make('tramo_peso')->label('Peso')->sortable(),
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
            'index' => Pages\ListPesos::route('/'),
            'create' => Pages\CreatePeso::route('/create'),
            'edit' => Pages\EditPeso::route('/{record}/edit'),
        ];
    }
}
