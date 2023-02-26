<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\Revisionable;

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
}
