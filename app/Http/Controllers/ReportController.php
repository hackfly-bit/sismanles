<?php

namespace App\Http\Controllers;

use App\Exports\TabulasiExport;
use App\Models\Sph;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use App\Models\Kegiatan_visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        $customer_sales = Customer::where('user_id', Auth::user()->id)->get();
        return view('report.index', compact('customer','customer_sales'));
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
        return view('pdf.reportTabulasi', compact('customer','customer_sales'));
    }

    public function generateExcel()
    {
        return Excel::download(new TabulasiExport, 'Tabulasi-Report.xlsx');
    }

    // show report by customer
    public function show_report_by_customer($id){
        $customer = Customer::find($id);
        $customer_sales = Customer::where('user_id', Auth::user()->id)->get();
        return view('pdf.report_by_customer', compact('customer','customer_sales'));
    }
}
