<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdottiAccessori extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prodotti_accessoris';

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
                  'prezzo',
                  'descrizione',
                  'codice',
                  'immagine',
                  'pdf',
                  'casaeditrice',
                  'attributi',
                  'categoria',
                  'quantita_disponibile',
                  'peso',
                  'valutazione_media'
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
     * @return App\Models\CasaEditrice
     */
    public function CasaEditrice()
    {
        return $this->belongsTo('App\Models\CasaEditrice','casaeditrice','id');
    }

    /**
     * Get the Category for this model.
     *
     * @return App\Models\Category
     */
    public function Category()
    {
        return $this->belongsTo('App\Models\Category','categoria','id');
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
