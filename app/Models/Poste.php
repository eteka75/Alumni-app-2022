<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    use HasFactory;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'postes';

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
    protected $fillable = ['fonction', 'structure', 'secteur_id', 'contact','lieu_poste','site_web', 'renseignements','annee_poste', 'membre_id'];

    public function membre()
    {
        return $this->belongsTo('App\Models\User','membre_id');
    }
}
