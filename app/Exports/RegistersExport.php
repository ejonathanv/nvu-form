<?php

namespace App\Exports;

use App\Models\Register;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegistersExport implements FromCollection, WithColumnWidths, WithHeadings
{

    public $zoomDateId;

    public function __construct($zoomDateId)
    {
        $this->zoomDateId = $zoomDateId;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Register::where('zoom_date_id', $this->zoomDateId)
            ->orderBy('created_at', 'desc')
            ->select('name', 'email', 'phone')
            ->get();
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'C' => 30,
        ];
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Correo',
            'Teléfono',
        ];
    }

}
