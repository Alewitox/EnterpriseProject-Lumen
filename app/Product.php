<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'name', 'description', 'id_distribution'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    public function distribution() {
        return $this->hasOne('App\Distribution');
    }

    public function availability() {
        return $this->hasMany('App\Availability', 'id_product');
    }

    public function reservation() {
        return $this->belongsToMany('App\Reservation');
    }
}