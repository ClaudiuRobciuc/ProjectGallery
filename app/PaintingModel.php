<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaintingModel extends Model
{
    use SoftDeletes;
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
    protected $fillable = ['refference_id', 'image', 'author', 'title', 'description', 'price', 'type', 'sold_at'];

    /**
     * The function to define relationship with the painting type model.
     *
     * @access public
     * @var array
     */
    public function paintingType()
    {
        return $this->hasOne('App\PaintingTypeModel', 'id', 'type');
    }

    public function getType()
    {
        return $this->paintingType->slug;
    }

    public function taxPrice()
    {
        return ($this->price + $this->price/4);
    }
}
