<?php

namespace App\Exports;

use App\Models\Interesado;
use Maatwebsite\Excel\Concerns\FromCollection;

class InteresadosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $interesados;

    public function __construct($interesados) {
        $this->interesados = $interesados;
    }

    public function collection()
    {
        // return Interesado::all();
        return Interesado::whereIn('id', $this->interesados)->get();
    }
}
