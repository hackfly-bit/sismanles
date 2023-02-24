<?php

namespace App\Models;

use App\Models\Category\Principal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];

    public function brand()
    {
        return $this->belongsTo(Principal::class);
    }
}
