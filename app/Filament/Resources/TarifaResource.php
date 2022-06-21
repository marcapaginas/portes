<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use App\Models\Peso;
use App\Models\Zona;
use Filament\Tables;
use App\Models\Medida;
use App\Models\Tarifa;
use App\Models\Agencia;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TarifaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TarifaResource\RelationManagers;

class TarifaResource extends Resource
{
    protected static ?string $model = Tarifa::class;

    protected static ?string $navigationIcon = 'heroicon-o-cash';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\BelongsToSelect::make('agencia_id')
                //     ->relationship('agencia', 'nombre')
                //     ->getOptionLabelUsing(fn ($value): ?string => Agencia::find($value)?->id)
                //     ->reactive()
                //     ->afterStateUpdated(fn (callable $set) => $set('zona_id', null)),

                Select::make('agencia_id')
                    ->label('Agencia')
                    ->options(Agencia::all()->pluck('nombre', 'id'))
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) => $set('zona_id', null))
                    ->afterStateUpdated(fn (callable $set) => $set('peso_id', null))
                    ->afterStateUpdated(fn (callable $set) => $set('medida_id', null)),

                Select::make('zona_id')
                    ->label('Zona')
                    ->options(function (callable $get) {
                        $agencia = Agencia::find($get('agencia_id'));

                        if (!$agencia) {
                            $z = Zona::all();
                            return Zona::all()->pluck('numero', 'id');
                        }

                        return Zona::where('agencia_id', $agencia->id)->get()->pluck('numero', 'id');
                    }),

                Select::make('peso_id')
                    ->label('Peso Hasta')
                    ->options(function (callable $get) {
                        $agencia = Peso::find($get('agencia_id'));

                        if (!$agencia) {
                            return Peso::all()->pluck('tramo_peso', 'id');
                        }

                        return Peso::where('agencia_id', $agencia->id)->get()->pluck('tramo_peso', 'id');
                    }),

                Select::make('medida_id')
                    ->label('Medida')
                    ->options(function (callable $get) {
                        $agencia = Medida::find($get('agencia_id'));

                        if (!$agencia) {
                            return Medida::all()->pluck('nombremedida', 'id');
                        }

                        return Medida::where('agencia_id', $agencia->id)->get()->pluck('nombremedida', 'id');
                    }),
                // Forms\Components\TextInput::make('medida_id')->label('medida_prueba')->required(),
                // Forms\Components\BelongsToSelect::make('zona_id')
                //     ->relationship('zona', 'numero')
                //     ->options(function (callable $get) {
                //         $agencia = Agencia::find($get('agencia_id'));

                //         if (!$agencia) {

                //             return Zona::all()->pluck('numero', 'zona_id');
                //         }

                //         return $agencia->zonas->pluck('numero', 'zona_id');
                //     }),

                // Forms\Components\BelongsToSelect::make('zona_id')
                //     ->relationship('zona', 'numero')
                //     ->getOptionLabelUsing(fn ($value): ?string => Zona::find($value)?->id),
                // Forms\Components\BelongsToSelect::make('medida_id')
                //     ->relationship('medida', 'id')
                //     ->getOptionLabelUsing(fn ($value): ?string => Medida::find($value)?->Largo),
                // Forms\Components\BelongsToSelect::make('peso_id')
                //     ->relationship('peso', 'tramo_peso')
                //     ->getOptionLabelUsing(fn ($value): ?string => Peso::find($value)?->id),
                Forms\Components\TextInput::make('tarifa_total')->label('Tarifa total')->required(),
                Forms\Components\TextInput::make('tarifa_por_kg')->label('Tarifa x Kg')->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable()->label('id'),
                Tables\Columns\TextColumn::make('agencia.nombre')->sortable()->label('Agencia'),
                Tables\Columns\TextColumn::make('zona.numero')->sortable()->label('Nº Zona'),
                Tables\Columns\TextColumn::make('peso.tramo_peso')->label('Peso hasta')->sortable(),
                Tables\Columns\TextColumn::make('medida.nombremedida')->label('Medidas'),
                Tables\Columns\TextColumn::make('tarifa_total')->sortable(),
                Tables\Columns\TextColumn::make('tarifa_total')->sortable(),
                Tables\Columns\TextColumn::make('tarifa_por_kg')->sortable(),
            ])
            ->filters([
                SelectFilter::make('agencia')->relationship('agencia', 'nombre')
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
            'index' => Pages\ListTarifas::route('/'),
            'create' => Pages\CreateTarifa::route('/create'),
            'edit' => Pages\EditTarifa::route('/{record}/edit'),
        ];
    }
}
