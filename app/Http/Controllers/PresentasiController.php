<?php

namespace App\Http\Controllers;

use App\Models\Presentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresentasiController extends Controller
{
    //create store function 
    public function store(Request $request){
    
        $request->validate([
            'tanggal' => 'required',
            'pertemuan' => 'required',
            'note' => 'required'
        ]);

        $presentasi = new Presentasi();
        $presentasi->user_id = Auth::user()->id;
        $presentasi->customer_id = $request->customer;
        $presentasi->kegiatan = "Presentasi";
        $presentasi->tanggal = $request->tanggal;
        $presentasi->pertemuan = $request->pertemuan;
        $presentasi->note = $request->note;

        $presentasi->save();

        return redirect()->route('customer.presentasi',$request->customer)->with('success', 'Data Presentasi Berhasil Di Tambah');
    }

    // create destroy Function for presentasi
    public function destroy($customer_id, $id){
        $presentasi = Presentasi::find($id);
        $presentasi->delete();
        return redirect()->route('customer.presentasi',$customer_id)->with('delete', 'Data Presentasi Berhasil Di Hapus');
    }
    
}
