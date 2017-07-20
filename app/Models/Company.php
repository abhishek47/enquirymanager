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
       return $this->hasMany(Enquiry::class);
    }
}
