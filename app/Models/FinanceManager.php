<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinanceManager extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

     public function financer()
    {
        return $this->belongsTo(Company::class);
    }

    public function enquiries()
    {
       return $this->hasMany(Enquiry::class);
    }
}
