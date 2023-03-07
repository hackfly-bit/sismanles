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
            'due_date' => 'required',
            'npwp' => 'required',
            'alamat_pengiriman' => 'required',

        ]);


        $preorder = new Preorder();
        $preorder->user_id = Auth::user()->id;
        $preorder->customer_id = $request->customer;
        $preorder->kegiatan = "Purchase Order";
        $preorder->npwp = $request->npwp;
        $preorder->due_date = $request->due_date;
        $preorder->alamat = $request->alamat_pengiriman;
        

        $preorder->save();

        return redirect()->route('customer.preorder',$request->customer)->with('success', 'Data Purchase Order Berhasil Di Tambah');

    }

    public function destroy($customer_id,$id){
        $preorder = Preorder::find($id);
        $preorder->delete();
        return redirect()->route('customer.preorder',$customer_id)->with('delete', 'Data Purchase Order Berhasil Di Hapus');
        }
}
