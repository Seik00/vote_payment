<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class RecordExport implements FromCollection, WithHeadings, WithStyles, WithEvents, WithColumnWidths
{
    use Exportable, RegistersEventListeners;

    public $index;
    protected $dropout, $filters;
    public static $summaryReport, $title;
    public function __construct($data, $filters)
    {
        $this->index = 0;
        $this->dropout = $data['data'];
        self::$title =  $data['title'];
        $this->filters = $filters;
        self::$summaryReport =  $this->dropout;
    }

    /**
    * @return \Illuminate\Support\Collection
    */ 
    public function collection()
    {
       
        return collect($this->dropout)->map(function ($item) {
            return $item;
          /* return [
                ++$this->index,
                $item['username'],
                $item['id'],
            ];*/
        });
    }

    public function headings(): array
    {
        return [];
    }

    public function columnWidths(): array
    {
        
        return [
            'A' => 12,
            'B' => 12,
            'C' => 12,
            'D' => 12,
            'E' => 12,
            'F' => 12,
            'G' => 12,
            'H' => 12,
            'I' => 12,
            'J' => 12,
            'K' => 12,
            'L' => 12,
            'M' => 12,
            'N' => 12,
        ];
    }

    public static function beforeSheet(BeforeSheet $event){
        $title = self::$title;
       $event->sheet->appendRows([$title], $event);
       /* $filters = request('dates');
         $epolicy = self::$epolicy;
        
       $event->sheet->appendRows([
            [' ', ' '],
            ['POS MALAYSIA BERHAD', ' ', ' ',' ',' ','Report Date: ', date("d/m/Y")],
            ['Payment History Transaction Details for '. $epolicy->panel_name],
            ['Payment No.: '. $epolicy->ref_no],
            ['Payment Amount: '. number_format($epolicy->pay_amount, 2)],
            ['Payment Date: '. $epolicy->payment_date],
            ['Payment Status: '. $epolicy->status_text],
            ['Approval Date: '. $epolicy->approved_date],
            ['Approval By: '. $epolicy->approved_name],
            [''],
            [
                "No",                               
                "Date",                                
                "Policy /Cover Note No",                  
                "Vehicle No",                 
                "Paid Amount",           
                
            ],
        ], $event);*/
    }

    public static function afterSheet(AfterSheet $event){
       /* $epolicy = self::$epolicy;
        $event->sheet->appendRows([
            [
                "Total",                               
                "",                                
                "",                  
                "",                 
                $epolicy->pay_amount
            ],
            [
                "",
                "",
                "",                  
                "",                 
                ""
            ],
            [
                "This report is computer generated. No signature is required"
            ]
        ], $event);

        $rowsCount = count($event->sheet->getDelegate()->toArray());
        $event->getDelegate()->getStyle("A".($rowsCount-2).":E".($rowsCount-2))->applyFromArray([
            'font' => ['bold' => true]
        ]);
        $event->getDelegate()->getStyle("A12:A".($rowsCount-2))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        */
    }

    public function styles(Worksheet $sheet)
    {
       /* $sheet->mergeCells('A2:E2')
            ->mergeCells('A3:E3')
            ->mergeCells('A4:E4')
            ->mergeCells('A5:E5')
            ->mergeCells('A6:E6')
            ->mergeCells('A7:E7')
            ->mergeCells('A8:E8')
            ->mergeCells('A9:E9');       

        $sheet->getStyle('A11:E11')
            ->getAlignment()
            ->setWrapText(1)
            ->setVertical(Alignment::VERTICAL_TOP)
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        return [
            2    => ['alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ]],
            3    => ['alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ]],
            4    => ['alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ]],
            5    => ['alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ]],
            6    => ['alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ]],
            7    => ['alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ]],
            8    => ['alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ]],
            9    => ['alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ]],
            10    => ['alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ]],
            11    => ['font' => ['bold' => true]],
        ];
        */
    }
    
}
