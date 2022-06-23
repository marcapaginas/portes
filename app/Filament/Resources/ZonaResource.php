<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Zona;
use Filament\Tables;
use App\Models\Agencia;
use App\Models\Provincia;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ZonaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ZonaResource\RelationManagers;
use App\Filament\Resources\ZonaResource\RelationManagers\ProvinciasRelationManager;

class ZonaResource extends Resource
{
    protected static ?string $model = Zona::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('agencia_id')
                    ->relationship('agencia', 'nombre')
                    ->getOptionLabelUsing(fn ($value): ?string => Agencia::find($value)?->id),
                Forms\Components\TextInput::make('numero')->required()->label('Nº Zona'),
                Forms\Components\BelongsToManyCheckboxList::make('provincias')
                    ->relationship('provincia', 'nombre')
                // ->getOptionLabelFromRecordUsing(fn (Provincia $record) => "{$record->nombre}"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('id')->sortable(),
                Tables\Columns\TextColumn::make('agencia.nombre')->label('Agencia')->sortable(),
                Tables\Columns\TextColumn::make('numero')->label('Zona')->sortable(),
                Tables\Columns\TagsColumn::make('provincia.nombre')->separator(',')->label('Provincias')
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
            // RelationManagers\ProvinciasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListZonas::route('/'),
            'create' => Pages\CreateZona::route('/create'),
            'edit' => Pages\EditZona::route('/{record}/edit'),
        ];
    }
}
