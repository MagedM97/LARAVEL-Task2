<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['rating', 'rating_count'];
    public function category(){

        return $this->belongsTo('App\Models\Category');
    }
    public function size(){

        return $this->belongsTo('App\Models\Size');
    }
    public function color(){

        return $this->belongsTo('App\Models\Color');
    }
    public static $rules = ['name' => 'required',
    'image' =>'required|image|max:2048',
    'price'=>'required|numeric|min:1',
    'discount'=>'required|numeric|min:0',
    ];
}
