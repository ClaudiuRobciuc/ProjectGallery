<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class PaintingTypeModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'painting_types';

     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = ['slug'];

    /**
     * The function to define relationship with the paintings model.
     *
     * @access public
     * @var array
     */
    public function paintings()
    {
        return $this->hasMany('App\PaintingModel', 'id', 'type');
    }
}
