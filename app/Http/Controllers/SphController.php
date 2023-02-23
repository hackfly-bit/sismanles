<?php

namespace App\Http\Controllers;

use App\Models\Category\Metode_Pembayaran;
use App\Models\Category\Metode_Pembelian;
use App\Models\Category\Sumber_Anggaran;
use App\Models\Category\Time_Line;
use App\Models\Customer;
use App\Models\Sph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sph = Sph::all();
        $sph_sales = Sph::where('user_id', Auth::user()->id)->get();

        return view('sph.index', compact('sph','sph_sales'));
    }

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sumber_anggaran = Sumber_Anggaran::all();
        $customer = Customer::all();
        $metode_pembelian = Metode_Pembelian::all();
        $metode_pembayaran = Metode_Pembayaran::all();
        $time_line = Time_Line::all();

        return view('sph.create', compact('customer', 'sumber_anggaran', 'metode_pembelian', 'metode_pembayaran', 'time_line'));
    }

    public function history($id){
        $sph = Sph::find($id);
        $history = $sph->revisionHistory;

        return view('sph.history', compact('history','sph'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'sumber_anggaran' => 'required',
            'nilai_pagu' => 'required',
            'metode_pembelian' => 'required',
            'metode_pembayaran' => 'required',
            'time_line' => 'required',
            'tanggal_pengiriman' => 'required',
            'tanggal_instalasi' => 'required'
        ]);

        $sph = new Sph;
        $sph->user_id =  Auth::user()->id;
        $sph->customer_id = $request->customer;
        $sph->sumber_anggaran = $request->sumber_anggaran;
        $sph->nilai_pagu = $request->nilai_pagu;
        $sph->metode_pembelian = $request->metode_pembelian;
        $sph->metode_pembayaran = $request->metode_pembayaran;
        $sph->time_line = $request->time_line;
        $sph->tanggal_pengiriman = $request->tanggal_pengiriman;
        $sph->tanggal_instalasi = $request->tanggal_instalasi;

        $sph_cek = Sph::where('customer_id', $request->customer)->get()->count();

        if($sph_cek > 0){
            
            return redirect()->route('sph.create')->with('success', 'Data Customer Sudah Ada');
        }

        $sph->save();

        return redirect()->route('sph.index')->with('success', 'Data SPH Berhasil Di Tambahkan !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sph  $sph
     * @return \Illuminate\Http\Response
     */
    public function show(Sph $sph)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sph  $sph
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sph = Sph::find($id);
        $sumber_anggaran = Sumber_Anggaran::all();
        $customer = Customer::all();
        $metode_pembelian = Metode_Pembelian::all();
        $metode_pembayaran = Metode_Pembayaran::all();
        $time_line = Time_Line::all();

        return view('sph.edit', compact('sph','customer', 'sumber_anggaran', 'metode_pembelian', 'metode_pembayaran', 'time_line'));
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sph  $sph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer' => 'required',
            'sumber_anggaran' => 'required',
            'nilai_pagu' => 'required',
            'metode_pembelian' => 'required',
            'metode_pembayaran' => 'required',
            'time_line' => 'required',
            'tanggal_pengiriman' => 'required',
            'tanggal_instalasi' => 'required'
        ]);

        $sph = Sph::find($id);
        $sph->user_id =  Auth::user()->id;
        $sph->customer_id = $request->customer;
        $sph->sumber_anggaran = $request->sumber_anggaran;
        $sph->nilai_pagu = $request->nilai_pagu;
        $sph->metode_pembelian = $request->metode_pembelian;
        $sph->metode_pembayaran = $request->metode_pembayaran;
        $sph->time_line = $request->time_line;
        $sph->tanggal_pengiriman = $request->tanggal_pengiriman;
        $sph->tanggal_instalasi = $request->tanggal_instalasi;

        $sph->save();

        return redirect()->route('sph.index')->with('success', 'Data SPH Berhasil Di Update !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sph  $sph
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sph = Sph::find($id);
        $sph->delete();

        return redirect()->route('sph.index')->with('success', 'Data SPH Berhasi Di Hapus !!');
    }
}
