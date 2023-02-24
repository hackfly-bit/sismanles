<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotationController extends Controller
{
    public function store(Request $request){
    
        $request->validate([
            'tanggal' => 'required',
            'status' => 'required',
            'note' => 'required'
        ]);

        $quotation =  new Quotation();
        $quotation->user_id = Auth::user()->id;
        $quotation->customer_id = $request->customer;
        $quotation->kegiatan = "Quotation";
        $quotation->tanggal = $request->tanggal;
        $quotation->status = $request->status;
        $quotation->note = $request->note;

        $quotation->save();

        return redirect()->route('customer.quotation', $request->customer )->with('success','Data Quotation Berhasil Di Tambah');

    }

    // Create Destroy Function
    public function destroy($customer_id, $id){
        $quotation = Quotation::find($id);
        $quotation->delete();
        return redirect()->route('customer.quotation', $customer_id)->with('delete','Data Quotation Berhasil Di Hapus');
    }

}