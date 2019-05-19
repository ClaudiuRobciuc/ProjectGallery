<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    
    //
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'orders';

     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = ['user_id', 'transaction_id', 'shipping_status_id', 'status_id', 'total_price', 'invoice'];

    /**
     * The function to define relationship with the users table.
     *
     * @access public
     * @var array
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

     /**
     * The function to define relationship with the order status table.
     *
     * @access public
     * @var array
     */
    public function orderStatus()
    {
        return $this->hasOne('App\OrderStatusModel', 'id', 'status_id');
    }

    /**
     * The function to define relationship with the shipping status table.
     *
     * @access public
     * @var array
     */
    public function shippingStatus()
    {
        return $this->hasOne('App\ShippingStatusModel', 'id', 'shippng_status_id');
    }

    public function taxPrice()
    {
        return ($this->total_price + $this->total_price/4);
    }

}
