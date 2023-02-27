<?php

namespace App\Http\Controllers;

use App\Exports\TabulasiExport;
use App\Models\Call;
use App\Models\Sph;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use App\Models\Kegiatan_visit;
use App\Models\Preorder;
use App\Models\Presentasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        // foreach data call , sph , visit,presentasi, preorder from customer
        $progress = array();
        foreach ($customer as $x) {
            $progress[$x->id] = 
               $this->check_null(Call::where('customer_id', $x->id)->get()->count()) + $this->check_null(Kegiatan_visit::where('customer_id', $x->id)->get()->count())+ $this->check_null(Sph::where('customer_id', $x->id)->get()->count())+ $this->check_null(Preorder::where('customer_id', $x->id)->get()->count())+$this->check_null(Presentasi::where('customer_id', $x->id)->get()->count());
            
        }



        

        

        $customer_sales = Customer::where('user_id', Auth::user()->id)->get();
        return view('report.index', compact('customer', 'customer_sales','progress'));
    }

    public function generatePDF()
    {
        // Make Generate pdf with dompdf
        $pdf = new PDF();
        // $pdf->setTemplate('report.tpl.php');
        // $pdf->setFile('report.pdf');
        // $pdf->setOption('margin', '0.5in');
        // $pdf->setOption('pageSize', 'A4');
        $customer = Customer::all();
        $customer_sales = Customer::where('user_id', Auth::user()->id)->get();
        return view('pdf.reportTabulasi', compact('customer', 'customer_sales'));
    }

    public function generateExcel()
    {
        return Excel::download(new TabulasiExport, 'Tabulasi-Report.xlsx');
    }

    // show report by customer
    public function show_report_by_customer($id)
    {
        $customer = Customer::find($id);
        $customer_sales = Customer::where('user_id', Auth::user()->id)->get();
        return view('pdf.report_by_customer', compact('customer', 'customer_sales'));
    }

    public function check_null($data)
    {

        if (empty($data)) {
            return 0;
        } else {
            return 1;
        }
    }
}
