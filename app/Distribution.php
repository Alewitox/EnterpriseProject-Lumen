<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit', 'duration', 'time_start', 'time_finish', 'block'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public $timestamps = false;

    
}