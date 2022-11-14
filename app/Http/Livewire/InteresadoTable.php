<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Interesado;

class InteresadoTable extends DataTableComponent
{
    protected $model = Interesado::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("Correo", "correo")
                ->sortable()
                ->searchable(),
            Column::make("País", "pais")
                ->sortable()
                ->searchable(),
            Column::make("Fecha", "fecha")
                ->sortable()
                ->searchable(),
            Column::make("Proy Id", "proyecto.id")
                ->sortable()
                ->searchable(),
            Column::make("Proy Nombre", "proyecto.nombre")
                ->sortable()
                ->searchable(),
            Column::make("Proy ciudad", "proyecto.ciudad.nombre")
                ->sortable()
                ->searchable(),
            Column::make("Proy Dpto", "proyecto.ciudad.departamento.nombre")
                ->sortable()
                ->searchable(),
        ];
    }
}
