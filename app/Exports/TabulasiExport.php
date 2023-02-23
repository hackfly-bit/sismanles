<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TabulasiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
   

    public function view(): View
    {
        return view('pdf.excel', [
            'customer' => customer::all()
        ]);
    }
}
