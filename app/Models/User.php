<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'photo',
        'type',
        'email',
        'step',
        'biographie',
        'tel',
        'sexe',
        'site_web',
        'matricule',
        'profile_photo_path',
        'password',
        'preferences',
        'username',
        'hd'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nom_prenom(){
        return  $this->nom.' '.$this->prenom;
    }
    public function prenom_nom(){
        return  $this->prenom.' '.$this->nom;
    }
    public function poste(){
        return  $this->hasMany('App\Models\Poste','membre_id');
    }
    public function getPoste(){
        $poste=$this->poste?$this->poste->first():'';
        //dd($poste);
        return ($poste)?$poste->fonction:null;
    }
    public function getEntreprise(){
        $poste=$this->poste?$this->poste->first():'';
        //dd($poste);
        return ($poste)?$poste->structure:null;
    }
    public function membre(){        
        return $this->type=='MEMBRE';
    }
    public function pub(){
        return  $this->hasMany('App\Models\Poste','membre_id');
    }
}
