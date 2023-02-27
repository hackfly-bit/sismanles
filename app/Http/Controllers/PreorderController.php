<?php

namespace App\Http\Controllers;

use App\Models\Preorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreorderController extends Controller
{
    // Make function for store data
    public function store(Request $request){

        $request->validate([
            'time_line' => 'required',
            'tanggal_pengiriman' => 'required',
            'tanggal_instalasi' => 'required',
            'status' => 'required',

        ]);


        $preorder = new Preorder();
        $preorder->user_id = Auth::user()->id;
        $preorder->customer_id = $request->customer;
        $preorder->kegiatan = "Preorder";
        $preorder->time_line = $request->time_line;
        $preorder->tanggal_pengiriman = $request->tanggal_pengiriman;
        $preorder->tanggal_instalasi = $request->tanggal_instalasi;
        $preorder->status = $request->status;
        

        $preorder->save();

        return redirect()->route('customer.preorder',$request->customer)->with('success', 'Data Preorder Berhasil Di Tambah');

    }

    public function destroy($customer_id,$id){
        $preorder = Preorder::find($id);
        $preorder->delete();
        return redirect()->route('customer.preorder',$customer_id)->with('delete', 'Data Preorder Berhasil Di Hapus');
        }
}
