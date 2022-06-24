<?php

namespace App\Http\Livewire;

use App\Filament\Resources\AgenciaResource;
use App\Models\Tarifa;
use Livewire\Component;
use App\Models\Provincia;
use Illuminate\Database\Eloquent\Builder;

class Portes extends Component
{
    public $prov;
    public $peso;
    public $largo;
    public $ancho;
    public $alto;
    public $volumetrico;
    public $ratioVolumetrico;
    public $pesoVolumetrico;
    public $tarifaVolumetrico;
    public $importe;
    public $agenciasResultados;
    public $resultados;

    public function render()
    {
        $this->provincias = Provincia::all();
        $this->resultados = collect();

        if ($this->prov) {
            $this->resultadosQuery = Tarifa::whereHas('zona', function (Builder $query) {
                $query->whereHas('provincia', function (Builder $query) {
                    $query->where('id', $this->prov);
                });
            })
                ->whereHas('peso', function (Builder $query) {
                    $query->where('tramo_peso', '>=', $this->peso ?: 0);
                })
                ->whereHas('medida', function (Builder $query) {
                    $query->where('largo', '>=', $this->largo ?: 0)
                        ->where('ancho', '>=', $this->ancho ?: 0)
                        ->where('alto', '>=', $this->alto ?: 0);
                })
                ->get();

            if ($this->resultadosQuery) {
                foreach ($this->resultadosQuery as $resultado) {

                    $resultado->importe = $resultado->tarifa_total;

                    $resultado->ratioVolumetrico = (int)$resultado->agencia->volumetrico;
                    $resultado->pesoVolumetrico = (((int)$this->largo * (int)$this->ancho * (int)$this->alto) * (int)$resultado->ratioVolumetrico) / 1000000;

                    if ($resultado->tarifa_por_kg != 0 && $this->largo && $this->ancho && $this->alto) {
                        $resultado->importe = $resultado->pesoVolumetrico * $resultado->tarifa_por_kg;
                        $resultado->volumetrico = 1;
                    }
                }
            }

            // $this->resultados = $this->resultados->where('importe', '>', 0)->sortBy('importe');

            $this->resultadosQuery = $this->resultadosQuery->where('importe', '>', 0)->sortBy('importe');

            $this->agenciasResultados = $this->resultadosQuery->pluck('agencia_id')->unique()->toArray();

            foreach ($this->agenciasResultados as $agencia) {
                $unico = $this->resultadosQuery->where('agencia_id', $agencia)->first();
                $this->resultados->push($unico);
            }
        }

        return view('livewire.portes');
    }
}
