<?php

namespace App\Http\Livewire;

use App\Models\Tarifa;
use Livewire\Component;
use App\Models\Provincia;
use Illuminate\Database\Eloquent\Builder;

class Portes extends Component
{
    public $prov;
    public $peso = 0;
    public $largo = 0;
    public $ancho = 0;
    public $alto = 0;
    public $volumetrico = 0;
    public $ratioVolumetrico = 0;
    public $pesoVolumetrico = 0;

    public function render()
    {
        if ($this->prov) {
            $this->resultados = Tarifa::whereHas('zona', function (Builder $query) {
                $query->whereHas('provincia', function (Builder $query) {
                    $query->where('id', $this->prov);
                });
            })
                ->whereHas('peso', function (Builder $query) {
                    $query->where('tramo_peso', '>=', $this->peso);
                })
                ->whereHas('medida', function (Builder $query) {
                    $query->where('largo', '>=', $this->largo)
                        ->where('ancho', '>=', $this->ancho)
                        ->where('alto', '>=', $this->alto);
                })
                ->orderBy('tarifa_total')
                ->get();

            if ($this->resultados) {
                foreach ($this->resultados as $resultado) {
                    $resultado->ratioVolumetrico = $resultado->agencia->volumetrico;
                    $resultado->pesoVolumetrico = (($this->largo * $this->ancho * $this->alto) * $resultado->ratioVolumetrico) / 1000000;
                }
            }
        }
        $this->provincias = Provincia::all();
        return view('livewire.portes');
    }
}
