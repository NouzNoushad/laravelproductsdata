<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'type',
        'brand',
        'price'
    ];
    public function setNameAttribute($value){

        return $this->attributes['name'] = Str::ucfirst($value);
    }
    public function setTypeAttribute($value){

        return $this->attributes['type'] = Str::ucfirst($value);
    }
    public function setBrandAttribute($value){

        return $this->attributes['brand'] = Str::ucfirst($value);
    }
    // one to many relation
    public function getProductRating(){

        return $this->hasMany('App\Models\Rating');
    }
}
