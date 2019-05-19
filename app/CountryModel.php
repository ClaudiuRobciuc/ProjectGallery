<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'countries';

     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = ['country_code', 'country_name'];

}
