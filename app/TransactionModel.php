<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'transactions';

     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = ['user_id', 'amount', 'transaction_id'];
}
