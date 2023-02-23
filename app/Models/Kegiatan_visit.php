<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\Revisionable;

class Kegiatan_visit extends Revisionable
{
    use HasFactory;

    protected $guarded = ['id'];

    public function customer(){
        return $this->belongsTo(Customer::class);
     }
}
