<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaintingModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'paintings';

     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = ['image', 'description', 'price', 'size', 'type'];
}
