<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'first_name', 'last_name', 'email', 'password', 'country_id', 'street', 'postal_code', 'city', 'phone_number', 'role_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The function to define relationship with the role model.
     *
     * @access public
     * @var array
     */
    public function role()
    {
        return $this->hasOne('App\RoleModel', 'id', 'role_id');
    }

    /**
     * The function to define relationship with country table.
     *
     * @access public
     * @var array
     */
    public function country()
    {
        return $this->belongsTo('App\CountryModel', 'country_id', 'id');
    }
    
    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name.' ';
    }

    public function getRole()
    {
        return $this->role->slug;
    }

    /**
     * The function to define relationship with the orders table.
     *
     * @access public
     * @var array
     */
    public function order()
    {
        return $this->hasOne('App\OrderModel', 'id', 'user_id');
    }

    /**
     * The function to define relationship with the carts table.
     *
     * @access public
     * @var array
     */
    public function carts()
    {
        return $this->hasOne('App\CartModel', 'id', 'identifier');
    }

}
