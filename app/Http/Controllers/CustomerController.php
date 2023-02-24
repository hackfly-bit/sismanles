<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Category\Status;
use App\Models\Category\Pertemuan;
use App\Models\Category\Segmentasi;
use Illuminate\Support\Facades\Auth;
use App\Models\Category\Jenis_Perusahaan;
use App\Models\Category\Principal;
use App\Models\Kegiatan_visit;
use App\Models\Quotation;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {

        $customer_sales = Customer::where('user_id', Auth::user()->id)->get();

       
        $customer = Customer::all();
        $jenis_perusahaan =  Jenis_Perusahaan::all();
        $segmentasi = Segmentasi::all();


        return view('customer.index', compact('customer','customer_sales', 'jenis_perusahaan', 'segmentasi'));
    }

    public function call($id)
    {
        $title = "Daftar History Call";
        $customer = Customer::find($id);
        $call = Call::where('customer_id', $id)->get();
        $call_by_sales = Customer::where('user_id', Auth::user()->id)->get();
        $pertemuan = Pertemuan::all();
        $status = Status::all();

        return view('kegiatan.call.index', compact('title','call','call_by_sales','customer','pertemuan','status'));
    }

    public function visit($id)
    {
        $title = "Daftar History Visit";
        $customer = Customer::find($id);
        $visit = Kegiatan_visit::where('customer_id', $id)->get();
        $visit_by_sales = Customer::where('user_id', Auth::user()->id)->get();
        $brand = Principal::all();
        $pertemuan = Pertemuan::all();
        $status = Status::all();

        return view('kegiatan.visit.index', compact('title','visit','visit_by_sales','customer','pertemuan','status','brand'));

    }

    public function quotation($id)
    {
        $title = "Daftar History Quotation";
        $customer = Customer::find($id);
        $quotation = Quotation::where('customer_id', $id)->get();
        $quotation_by_sales = Customer::where('user_id', Auth::user()->id)->get();
        $pertemuan = Pertemuan::all();
        $status = Status::all();

        return view('kegiatan.quotation.index', compact('title','quotation','quotation_by_sales','customer','pertemuan','status'));
        

    }

    public function history($id)
    {

        $customer = Customer::find($id);
        $history = $customer->revisionHistory;

        return view('customer.history', compact('history', 'customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $jenis_perusahaan =  Jenis_Perusahaan::all();
        $segmentasi = Segmentasi::all();

        return view('customer.create', compact('jenis_perusahaan', 'segmentasi'));
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
            'nama_instansi' => 'required',
            'nama_customer' => 'required',
            'jabatan' => 'required',
            'nomer_hp' => 'required',
            'jenis_perusahaan' => 'required',
            'segmentasi' => 'required',
            'alamat' => 'required'

        ]);

        $customer  =  new Customer;
        $customer->user_id =  Auth::user()->id;
        $customer->nama_instansi = $request->nama_instansi;
        $customer->nama_customer = $request->nama_customer;
        $customer->jabatan = $request->jabatan;
        $customer->nomer_hp  = $request->nomer_hp;
        $customer->jenis_perusahaan = $request->jenis_perusahaan;
        $customer->segmentasi = $request->segmentasi;
        $customer->alamat = $request->alamat;

        $customer->save();


        return redirect()->route('customer.index')->with('success', 'Data Customer Telah Di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $customer = Customer::find($id);
        $revision = $customer->revisionHistory;

        return view('customer.show', compact('customer', 'revision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pelanggan = Customer::find($id);
        $jenis_perusahaan =  Jenis_Perusahaan::all();
        $segmentasi = Segmentasi::all();

        return view('customer.edit', compact('pelanggan', 'jenis_perusahaan', 'segmentasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'nama_instansi' => 'required',
            'nama_customer' => 'required',
            'jabatan' => 'required',
            'nomer_hp' => 'required',
            'jenis_perusahaan' => 'required',
            'segmentasi' => 'required',
            'alamat' => 'required'

        ]);

        $customer  =  Customer::find($id);
        $customer->user_id =  Auth::user()->id;
        $customer->nama_instansi = $request->nama_instansi;
        $customer->nama_customer = $request->nama_customer;
        $customer->jabatan = $request->jabatan;
        $customer->nomer_hp  = $request->nomer_hp;
        $customer->jenis_perusahaan = $request->jenis_perusahaan;
        $customer->segmentasi = $request->segmentasi;
        $customer->alamat = $request->alamat;

        $customer->save();


        return redirect()->route('customer.index')->with('success', 'Data Customer Telah Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Data Berhasil Di Hapus !!');
    }
}
