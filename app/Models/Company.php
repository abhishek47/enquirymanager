<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'website', 'address', 'phones', 'fax'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function enquiries()
    {
    	if(auth()->user()->role < 2) {
         return $this->hasMany(Enquiry::class);
       } else {
       	 return $this->hasMany(Enquiry::class)->where('user_id', auth()->id());
       }
    }

    public function employees()
    {
       return $this->hasMany(User::class);
    }

    public function vehicles()
    {
       return $this->hasMany(Vehicle::class);
    }
}
