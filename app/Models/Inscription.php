<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Inscription extends Model
{
    use LogsActivity;
    use SoftDeletes;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inscriptions';

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
    protected $fillable = ['site','nom', 'prenom','code', 'sexe', 'date_naissance', 'lieu_naissance', 'contact', 'nom_pere', 'nom_mere', 'contact_parents', 'nom_tuteur', 'contact_tuteur', 'email', 'formation_id', 'classe', 'acte_de_naissance', 'dernier_bulletin', 'certificat', 'photo'];

    

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " a été {$eventName}";
    }
    public function formation()
    {
        return $this->belongsTo('App\Models\Formation','formation_id');
    }
}
