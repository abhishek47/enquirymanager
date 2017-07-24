<?php

namespace App;

use App\Models\Company;
use App\Models\Enquiry;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company()
    {
        if($this->role == 0) {
          return $this->hasOne(Company::class);
        } else {
            return $this->belongsTo(Company::class);
        }
    }

     public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }

    public static function findOrCreate($data)
    {
       $user = static::where('email', $data['email'])->first();
       if(!$user)
       {
            $user =  static::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => bcrypt('123456'),
        ]);
       } 
       return $user;
    }


    public function isAdmin()
    {
        return $this->role == 0 ? true : false;
    }
}
