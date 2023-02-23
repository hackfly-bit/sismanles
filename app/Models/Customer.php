<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Venturecraft\Revisionable\RevisionableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Venturecraft\Revisionable\Revisionable;

class Customer extends Revisionable
{
    use HasFactory;

    protected $guarded = ['id'];


    public function visit()
    {
        return $this->hasMany(Kegiatan_visit::class);
    }

    public function sph()
    {
        return $this->hasMany(Sph::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
