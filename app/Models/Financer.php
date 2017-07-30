<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
