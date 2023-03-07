<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sph;
use App\Models\Call;
use App\Models\User;
use App\Models\Customer;
use App\Models\Preorder;
use Carbon\CarbonPeriod;
use App\Models\Presentasi;
use App\Models\Kegiatan_other;
use App\Models\Kegiatan_visit;
use App\Models\Category\Status;
use App\Models\Category\Pertemuan;
use App\Models\Category\Principal;
use App\Models\Category\Time_Line;
use Illuminate\Support\Facades\DB;
use App\Models\Category\Segmentasi;
use App\Models\Category\Jenis_Kegiatan;
use App\Models\Category\Sumber_Anggaran;
use App\Models\Category\Jenis_Perusahaan;
use App\Models\Category\Metode_Pembelian;
use App\Models\Category\Metode_Pembayaran;

class MainController extends Controller
{
    public function index()
    {

        $customer = Customer::all()->take(5)->sortByDesc('id');
        $a = Customer::all()->count();
        $b = Kegiatan_visit::all()->count();
        $c = Kegiatan_other::all()->count();
        $d = Sph::all()->count();
        $e =  User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'sales');
            },
        )->get();
        $f = Call::all()->count();
        $g = Preorder::all()->count();
        $h = Presentasi::all()->count();

        $customer_chart = DB::table('customers')->select(DB::raw("count(id) as Total"), DB::raw("(DATE_FORMAT(created_at, '%m-%Y')) as month_year"))->orderBy('created_at')->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))->pluck('Total', 'month_year');
        $kegiatan_visit_chart = DB::table('kegiatan_visits')->select(DB::raw("count(id) as Total"), DB::raw("(DATE_FORMAT(created_at, '%m-%Y')) as month_year"))->orderBy('created_at')->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))->pluck('Total', 'month_year');
        $kegiatan_other_chart = DB::table('kegiatan_others')->select(DB::raw("count(id) as Total"), DB::raw("(DATE_FORMAT(created_at, '%m-%Y')) as month_year"))->orderBy('created_at')->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))->pluck('Total', 'month_year');
        $sph_chart = DB::table('sphs')->select(DB::raw("count(id) as Total"), DB::raw("(DATE_FORMAT(created_at, '%m-%Y')) as month_year"))->orderBy('created_at')->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))->pluck('Total', 'month_year');
        $sph_by_sales = DB::table('sphs')->select('user_id', DB::raw('sum(nilai_pagu) as total'))->groupBy('user_id')->get()->pluck('total', 'user_id');
        $count_customer_by_sales = DB::table('users')->join("customers", "users.id", "=", "customers.user_id")->selectRaw('username, count(customers.id) as total,customers.created_at as date')->groupBy(DB::raw("customers.created_at"))->get();
        //return $count_customer_by_sales;

        $data_brand = DB::table('sphs')->select('brand', DB::raw("count(brand) as value"))
        ->groupBy('brand')
        ->orderBy('sphs.brand','asc')
        ->get();


        $chart_by_sales = DB::table("users")
            ->join("sphs", "users.id", "=", "sphs.user_id")
            ->selectRaw("username, sum(sphs.nilai_pagu) as total")
            ->where('role','sales')
            ->groupBy("username")
            ->get();

        // monthly date 

        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        $date_label =[];
        $period = CarbonPeriod::create($start, $end);
        foreach ($period as $key => $value) {
            $date_label[$key] = $value->format('d-m-Y');
        }


        // return $date_label;

        
        

        $count_sales = Customer::where('user_id', 1)->get();

        return view('dashboard', compact('data_brand','a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'count_sales', 'customer', 'customer_chart', 'kegiatan_visit_chart', 'kegiatan_other_chart', 'sph_chart', 'chart_by_sales', 'count_customer_by_sales','date_label'));
    }


    public function setting()
    {
    }

    public function sales()
    {
    }

    public function teknisi()
    {
    }

    public function user()
    {
        $user = User::all();

        return view('setting.user.index', compact('user'));
    }

    public function setting_select()
    {
        $a = Jenis_Kegiatan::all();
        $b = Jenis_Perusahaan::all();
        $c = Metode_Pembayaran::all();
        $d = Metode_Pembelian::all();
        $e = Pertemuan::all();
        $f = Principal::all();
        $g = Segmentasi::all();
        $h = Status::all();
        $i = Sumber_Anggaran::all();
        $j = Time_Line::all();



        return view('setting.setting-select.index', compact('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j'));
    }

    

    public function monthly_data($id)
    {
        $call = DB::table('calls')->where('user_id', $id)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get()->count();
        $visit = DB::table('kegiatan_visits')->where('user_id', $id)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get()->count();
        $sph = DB::table('sphs')->where('user_id', $id)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get()->count();
        $po = DB::table('preorders')->where('user_id', $id)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get()->count();
        $presentasi = DB::table('presentasis')->where('user_id', $id)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get()->count();

        // return all variable data

        return [$call, $visit, $sph, $po, $presentasi];
    }

    // Function for display kpi from sales



}
