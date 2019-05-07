<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'cart';

     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = ['item_id', 'user_id', 'total_price'];

    /**
     * The function to define relationship with the paintings model.
     *
     * @access public
     * @var array
     */
    public function cart()
    {
        return $this->hasOne('App\PaintingModel', 'id', 'item_id');
    }
}
