<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Call;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function sph(){
        return $this->hasMany(Sph::class);
    }

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

    public function new_customer_weekly($id)
    {
        return Customer::where('user_id', $id)->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->get()->count();
    }

    public function call_weekly($id)
    {
        return Call::where('user_id', $id)->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->get()->count();
    }

    public function visit_weekly($id)
    {
        return Kegiatan_visit::where('user_id', $id)->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->get()->count();
    }

    public function sph_weekly($id)
    {
        return Sph::where('user_id', $id)->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->get()->count();
    }

    public function preorder_weekly($id)
    {
        return Preorder::where('user_id', $id)->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->get()->count();
    }

    public function presentasi_weekly($id)
    {
        return Presentasi::where('user_id', $id)->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->get()->count();
    }

    // Monthly KPI Setting

    public function new_customer_monthly($id)
    {
        return Customer::where('user_id', $id)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get()->count();
    }

    public function call_monthly($id)
    {
        return Call::where('user_id', $id)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get()->count();
    }

    public function visit_monthly($id)
    {
        return Kegiatan_visit::where('user_id', $id)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get()->count();
    }

    public function sph_monthly($id)
    {
        return Sph::where('user_id', $id)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get()->count();
    }

    public function preorder_monthly($id)
    {
        return Preorder::where('user_id', $id)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get()->count();
    }

    public function presentasi_monthly($id)
    {
        return Presentasi::where('user_id', $id)->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()])->get()->count();
    }

    

    

}

