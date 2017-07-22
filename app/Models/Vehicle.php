<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function enquiries()
    {
       return $this->hasMany(Enquiry::class);
    }
}
