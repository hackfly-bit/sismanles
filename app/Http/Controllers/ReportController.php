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
        $customer = Customer::all();
        $count = $customer->count();

        $date = Carbon::now();

        // view()->share('customer', compact('customer'));
        return view('pdf.reportTabulasi', compact('customer','date','count'));
        // $pdf = app('dompdf.wrapper');
        // $pdf = PDF::loadView('pdf.reportTabulasi', compact('customer', 'date', 'count'));

        // return $pdf->download('invoice.pdf')

        // return view('pdf.reportTabulasi', compact('customer'));
    }

    public function generateExcel()
    {
        return Excel::download(new TabulasiExport, 'Tabulasi-Report.xlsx');
    }
}
