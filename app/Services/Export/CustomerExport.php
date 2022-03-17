<?php

namespace App\Services\Export;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CustomerExport implements FromView, ShouldAutoSize, WithStyles
{

    public function __construct(private array $data)
    {
    }

    public function view(): View
    {
        return view('excel.exceldata', [
            'userData' => $this->data
        ]);
    }

    public function styles(Worksheet $sheet): array
    {

        $sheet->getStyle('A1:'.$sheet->getHighestColumn().'1')->getFill()->setFillType(Fill::FILL_SOLID)->setStartColor(new Color('CCCCCC'));

        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }
}
