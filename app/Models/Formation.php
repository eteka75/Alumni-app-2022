<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'formations';

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
    protected $fillable = ['annee_academique', 'etablissement_id', 'filiere_id', 'diplome', 'theme_memoire', 'membre_id'];

    public function membre()
    {
        return $this->belongsTo('App\Models\User','membre_id');
    }
}
