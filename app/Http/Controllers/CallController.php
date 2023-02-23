<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CallController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'pertemuan' => 'required',
            'status' => 'required',
            'note' => 'required'
        ]);

        $call = new Call;
        $call->user_id = Auth::user()->id;
        $call->customer_id = $request->customer;
        $call->kegiatan = "Call";
        $call->tanggal = $request->tanggal;
        $call->pertemuan = $request->pertemuan;
        $call->status = $request->status;
        $call->note = $request->note;

        $call->save();

        return redirect()->route('customer.call',$request->customer)->with('success','Data Call Berhasil Di Tambah');
        
    }

    public function update()
    {
        # code...
    }

    public function destroy($customer_id,$id)
    {
        $call = Call::find($id);
        $call->delete();

        return redirect()->route('customer.call',$customer_id)->with('delete','Data Call Berhasil Di Hapus');

    }
}
