<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autori extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'autoris';

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
                  'nome',
                  'cognome',
                  'descrizione',
                  'url_cv',
                  'foto',
                  'url_pagina_personale',
                  'percentuale',
                  'casa_editrice'
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
     * Get the CasaEditrice for this model.
     *
     * @return App\Models\Casa_Editrice
     */
    public function CasaEditrice()
    {
        return $this->belongsTo('App\Models\Casa_Editrice','casa_editrice','id');
    }



}
