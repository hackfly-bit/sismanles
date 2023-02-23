<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    use HasFactory;
    public $table = 'principal';
    protected $guarded = ['id'];
}
