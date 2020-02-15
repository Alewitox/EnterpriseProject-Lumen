<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'timestamp', 'price', 'quota', 'id_products'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    public function product() {
        return $this->belongsTo('App\Product');
    }
    
}