<?php

namespace App\Exports;

use App\Models\Transaccion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaccionesEliminadasExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transaccion::onlyTrashed()->get([
            'id', 'Codigo_App', 'fecha', 'valor', 'Cod_Cadena', 'Cod_Restaurante'
        ]);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID', 'Código App', 'Fecha', 'Valor', 'Código Cadena', 'Código Restaurante'
        ];
    }
}
