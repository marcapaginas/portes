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

    public function render()
    {


        if ($this->prov)
            $this->resultados = Tarifa::whereHas('zona', function (Builder $query) {
                $query->whereHas('provincia', function (Builder $query) {
                    $query->where('id', $this->prov);
                });
            })
                ->whereHas('peso', function (Builder $query) {
                    $query->where('tramo_peso', '<=', $this->peso);
                })->get();
        // else
        //     $this->resultados = $tarifa;
        $this->provincias = Provincia::all();
        return view('livewire.portes');
    }
}
