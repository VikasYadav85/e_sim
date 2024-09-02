<?php
namespace App\Exports;
use App\user;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
 use PDF;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class Salesinvoicependingreport implements FromView,ShouldAutoSize,WithCustomStartCell,WithEvents 
   {
       
	protected $invoice_id;


	public $agent_name     = array();
	
	public function startCell(): string
    {
        return 'A1';

    }
	
   
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->mergeCells('A1:C1');
              

                $event->sheet->getStyle('A1:C1')->applyFromArray([
                    'font' => [
                        'name' => 'Calibri',
                        'size' => 18,
                        'bold' => true,
                     
                    ],
                 
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Center horizontal
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // Center vertical
                    ],
                
                ]);     
    
                // Set the main heading in cell A1
                $event->sheet->setCellValue('A1', 'Sales Invoice');
               
    
                // Set the sub-heading in the next row (cell A2)
                $event->sheet->getStyle('A3:C3')->applyFromArray([
                    'font' => [
                        'name' => 'Calibri',
                        'size' => 14, // Adjust the font size as needed
                        'bold' => true,
                        'color' => ['argb' => '#000000'],     
                    ],
                ]);
                
                // Set the sub-heading text in cell A2
               
            },
        ];
    }
	
    function __construct($invoice_id) {
        $this->invoice_id = $invoice_id;
     
    }
	
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
		ini_set('memory_limit', '-1');

        $user = Auth::user();
        $TenantCode= $user->DTCode;
        $current_date=date("Y-m-d");	 
            $get_data = DB::table('tbl_sales_invoice_header as riheader')
            ->select('riheader.inv_id','riheader.TenantCode','riheader.ura_invoiceNo','riheader.DocumentNumber')
            ->where('riheader.TenantCode',$TenantCode)
           // ->where('riheader.TenantCode',$TenantCode)
            //->where('riheader.ura_invoiceNo',null)
            ->where('riheader.efris_posted','0')
            ->orderBy('riheader.inv_id', 'desc')
            ->get();
            
  
	    return view('export.sales_invoice_pending_report',compact('get_data'));			    
    
    
    }
	
 }
