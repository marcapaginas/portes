<?php

namespace App\Http\Livewire;

use App\Models\Peso;
use App\Models\Provincia;
use App\Models\Tarifa;
use Livewire\Component;

class Search extends Component
{
    public $peso;
    // public $ancho;
    // public $largo;
    // public $alto;
    public $prov;
    // public $tarif;
    // public $resultados;

    // public function getResultados()
    // {
    //     $peso = (int) $this->peso;
    //     $ancho = (int) $this->ancho;
    //     $largo = (int) $this->largo;
    //     $alto = (int) $this->alto;
    //     $prov = (int) $this->prov;
    //     $tarif = Tarifa::all();

    //     //! CHECK PROVINCIA
    //     $resultados = $tarif->where('zona.provincia.id', '=', $prov);
    //     //! CHECK PESO
    //     //$resultados = $tarif->where('peso.tramo_peso', '<=', $peso);


    //     // $tarifas = Tarifa::with('peso.tramo_peso')
    //     //     ->with('medida.ancho')
    //     //     ->with('medida.largo')
    //     //     ->with('medida.alto')
    //     //     // ->where('tramo_peso', '<=', $peso)
    //     //     ->get();


    //     //$tarifas = Tarifa::with('peso.tramo_peso')->has('peso.tramo_peso', '<=', $peso)->get();
    //     //$resultados = $tarifas::peso()->where('tramo_peso', '<=', $peso);

    //     $this->resultados = $resultados;
    //     return view('livewire.search');
    // }

    public function render()
    {
        $peso = (int) $this->peso;
        // $resultados = Peso::where('tramo_peso', '<=', $peso)
        //     ->get();
        // $this->resultados = $resultados;
        // $this->resultados = $resultados;


        // $peso = (int) $this->peso;
        // $ancho = (int) $this->ancho;
        // $largo = (int) $this->largo;
        // $alto = (int) $this->alto;
        // $prov = (int) $this->prov;

        // $provincias = Provincia::all();

        $this->provincias = Provincia::all();
        $this->tarifas = Tarifa::all();
        // $tarif = Tarifa::all();

        //! CHECK PROVINCIA
        // $resultados = $tarif->where('zona.provincia.id', '=', $prov);
        // $this->resultados = $resultados;

        //$tarif = Tarifa::all();
        //$provincias = ['Murcia', 'Alicante'];
        return view('livewire.search');
    }
}
