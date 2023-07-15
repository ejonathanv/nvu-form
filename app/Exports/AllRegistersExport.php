<?php

namespace App\Exports;

use App\Models\Register;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AllRegistersExport implements FromCollection, WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $user = auth()->user();
        $referral = $user->referral;
        $registers = Register::where('referral_id', $referral->id)
            ->orderBy('created_at', 'desc')
            ->select('name', 'email', 'phone')
            ->get();

        return $registers;
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
