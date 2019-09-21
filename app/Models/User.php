<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  //'role_id',
                  'name',
                  'email',
                  'avatar',
                  'password',
                  'remember_token',
                  'settings',
                  'isVendor',
                  'isCustomer',
                  'isAdmin'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    


    /**
     * Get the casaEditrices for this model.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function casaEditrices()
    {
        return $this->hasMany('App\Models\CasaEditrice','user_id','id');
    }

    

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
