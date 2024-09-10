<?php

namespace App\Exports;

use App\Models\Datasiswa;
use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DatasiswaExport implements FromCollection,WithHeadings,WithEvents,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Datasiswa::all(
            'id_kelas',
            'nm_siswa',
            'no_induk',
            // 'nisn',
            'jk',
            'email'
        );
   
		
    }
    public function headings(): array
    {
        return [
            'id_kelas',
            'nm_siswa',
            'no_induk',
            // 'nisn',
            'jk',
            'email'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
            },
        ];
    }

}
