<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'company_id', 'name', 'vehicle_cost', 'rto_charges', 'insuarance_charges', 'hpa_charges', 'address', 'phone', 'buy_date', 'contact_date', 'vehicle_color', 'total', 'payment_type', 'occupation', 'vehicle_id', 'financer_id', 'finance_manager_id'
    ];

    public function company()
    {
    	return $this->belongsTo(Company::class);
    }

    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function vehicle()
    {
    	return $this->belongsTo(Vehicle::class);
    }

    public function financer()
    {
        return $this->belongsTo(Financer::class);
    }

    public function financeManager()
    {
        return $this->belongsTo(FinanceManager::class, 'finance_manager_id');
    }
}
