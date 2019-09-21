<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpartitoLibro extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'spartito_libros';

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
                  'codice_interno',
                  'nome',
                  'descrizione',
                  'pdf_anteprima',
                  'pdf_da_vendere',
                  'foto',
                  'categoria',
                  'ranking',
                  'autore',
                  'altro',
                  'casa_editrice',
                  'durata',
                  'pagine',
                  'audio',
                  'versione',
                  'quantita',
                  'peso',
                  'prezzo_cartaceo',
                  'prezzo_multimediale',
                  'prezzo_cartaceo_multimediale'
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
     * Get the Category for this model.
     *
     * @return App\Models\Category
     */
    public function Category()
    {
        return $this->belongsTo('App\Models\Category','categoria','id');
    }

    /**
     * Get the Autori for this model.
     *
     * @return App\Models\Autori
     */
    public function Autori()
    {
        return $this->belongsTo('App\Models\Autori','autore','id');
    }

    /**
     * Get the CasaEditrice for this model.
     *
     * @return App\Models\CasaEditrice
     */
    public function CasaEditrice()
    {
        return $this->belongsTo('App\Models\CasaEditrice','casa_editrice','id');
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
