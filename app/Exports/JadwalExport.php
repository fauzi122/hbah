<?php

namespace App\Exports;

use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JadwalExport implements FromCollection,WithHeadings,WithEvents,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jadwal::all(
            'no_induk',
            'id_kelas',
            'id_mtk',
            'nm_mtk',
            'hari',
            'mulai',
            'selsai',
            'ruang',
        );
    }

    public function headings(): array
    {
        return [
            'no_induk',
            'id_kelas',
            'nm_mtk',
            'hari',
            'mulai',
            'selsai',
            'ruang',
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
