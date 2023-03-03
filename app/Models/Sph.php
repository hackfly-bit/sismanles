<?php

namespace App\Models;

use App\Models\Category\Principal;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\Revisionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sph extends Revisionable
{
    use HasFactory;

    protected $guarded = ['id'];


    public function customer(){

        return $this->belongsTo(Customer::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function brand($id)
    {
        return Principal::where('id',$id)->get()->pluck('name')->first();
    }
}
