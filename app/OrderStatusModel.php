<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatusModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'order_status';

     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = ['status'];

    /**
     * The function to define relationship with the paintings model.
     *
     * @access public
     * @var array
     */
    public function orders()
    {
        return $this->hasMany('App\OrderModel', 'id', 'status_id');
    }
}
