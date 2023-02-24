<?php

namespace App\Http\Controllers;

use App\Models\Category\Jenis_Kegiatan;
use App\Models\Category\Pertemuan;
use App\Models\Category\Principal;
use App\Models\Category\Status;
use App\Models\Customer;
use App\Models\Kegiatan_visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan_visit = Kegiatan_visit::all();
        $kegiatan_visit_sales = Kegiatan_visit::where('user_id', Auth::user()->id)->get();

        return view('kegiatan.visit.index', compact('kegiatan_visit','kegiatan_visit_sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $jenis_kegiatan = Jenis_Kegiatan::all();
        $principal = Principal::all();
        $pertemuan = Pertemuan::all();
        $status = Status::all();
        $customer_by_sales = Customer::where('user_id', Auth::user()->id)->get();

        return view('kegiatan.visit.create', compact('jenis_kegiatan','principal','pertemuan','status','customer','customer_by_sales'));
    }

    public function history($id){
        $visit = Kegiatan_visit::find($id);
        $history = $visit->revisionHistory;

        return view('kegiatan.other.history', compact('history','visit'));
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

            'tanggal' => 'required',
            'products' => 'required',
            'brand' => 'required',
            'pertemuan' => 'required',
            'status' => 'required',
            'note' => 'required'

        ]);

        


        $visit = new Kegiatan_visit;
        $visit->user_id = Auth::user()->id;
        $visit->customer_id = $request->customer;
        $visit->kegiatan = "Visit";
        $visit->tanggal = $request->tanggal;
        $visit->produk = $request->products;
        $visit->brand = $request->brand;
        $visit->pertemuan = $request->pertemuan;
        $visit->status = $request->status;
        $visit->note = $request->note;

        // Checking Duplicate Data 

        $visit->save();


        return redirect()->route('customer.visit', $request->customer)->with('success', 'Data Visit Berhasil Di Tambah !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan_visit  $kegiatan_visit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan_visit  $kegiatan_visit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan_visit = Kegiatan_visit::find($id);
        $customer = Customer::all();
        $jenis_kegiatan = Jenis_Kegiatan::all();
        $principal = Principal::all();
        $pertemuan = Pertemuan::all();
        $status = Status::all();
        $customer_by_sales = Customer::where('user_id', Auth::user()->id)->get();

        return view('kegiatan.visit.edit', compact('kegiatan_visit','jenis_kegiatan','principal','pertemuan','status','customer','customer_by_sales'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan_visit  $kegiatan_visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'customer' => 'required',
            'jenis_kegiatan' => 'required',
            'tanggal' => 'required',
            'produk' => 'required',
            'principal' => 'required',
            'pertemuan' => 'required',
            'status' => 'required',
            'deskripsi' => 'required'

        ]);


        $visit = Kegiatan_visit::find($id);
        $visit->user_id = Auth::user()->id;
        $visit->customer_id = $request->customer;
        $visit->jenis_kegiatan = $request->jenis_kegiatan;
        $visit->tanggal_visit = $request->tanggal;
        $visit->produk = $request->produk;
        $visit->principal = $request->principal;
        $visit->pertemuan_ke = $request->pertemuan;
        $visit->status = $request->status;
        $visit->deskripsi = $request->deskripsi;

        $visit->save();

        return redirect()->route('visit.index')->with('success', 'Data Visit Berhasil Di Update !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan_visit  $kegiatan_visit
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer_id, $id)
    {
        $visit = Kegiatan_visit::find($id);
        $visit->delete();

        return redirect()->route('customer.visit', $customer_id)->with('delete', 'Data Visit Berhasil Di Hapus !!');


    }
}
