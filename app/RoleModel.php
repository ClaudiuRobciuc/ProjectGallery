<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @access protected
     * @var string
     */
    protected $table = 'roles';

     /**
     * The attributes that are mass assignable.
     *
     * @access protected
     * @var array
     */
    protected $fillable = ['slug', 'name'];

}
