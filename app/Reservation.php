<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total', 'status', 'date'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
    
    public $timestamps = false;


    public function products(){
        return $this->belongsToMany('App\Product','items_reservation','id_reservation','id_product')
        ->withPivot('price')
        ->withTimestamps();
    }
}