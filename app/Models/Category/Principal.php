<?php

namespace App\Models\Category;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Principal extends Model
{
    use HasFactory;
    public $table = 'principal';
    protected $guarded = ['id'];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
