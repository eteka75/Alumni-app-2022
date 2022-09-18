<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Activite;
use App\Models\Categorie;
use App\Models\Page;
use App\Models\Communique;
use App\Models\Slide;
use App\Models\Evenement;
use App\Models\Membre;
use App\Models\Enseignant;
use App\Models\Formation;
use App\Models\GalerieImage;
use App\Models\GalerieVideo;
use App\Models\Fichier;
use App\Models\Message;
use Auth;

class AdminController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        View::share('page', 'tb');

        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {

        /*$this->userCheck();
          
        $nb_users=User::count();
        $nb_activites=Activite::count();
        $nb_cat=Categorie::count();
        $nb_a_activites=Activite::where('etat',1)->count();
        $nb_d_activites=Activite::where('etat',"<>",1)->count();
        $nb_messages=Message::count();
        $nb_pa_activites=$nb_pd_activites=0;
        if($nb_activites>0){
        $nb_pa_activites=round(($nb_a_activites/$nb_activites)*100,2);
        $nb_pd_activites=round(($nb_d_activites/$nb_activites)*100,2);
        }
        
        $nb_pages=Page::count();
        $nb_a_pages=Page::where('etat',1)->count();
        $nb_d_pages=Page::where('etat',"<>",1)->count();
        $nb_pa_pages=$nb_pd_pages=0;
        if($nb_pages>0){
        $nb_pa_pages=round(($nb_a_pages/$nb_pages)*100,2);
        $nb_pd_pages=round(($nb_d_pages/$nb_pages)*100,2);
        }

        $nb_com=Communique::count();
        $nb_a_com=Communique::where('etat',1)->count();
        $nb_d_com=Communique::where('etat',"<>",1)->count();
        $nb_pa_com=$nb_pd_com=0;
        if($nb_com>0){
            $nb_pa_com=round(($nb_a_com/$nb_com)*100,2);
            $nb_pd_com=round(($nb_d_com/$nb_com)*100,2);
        }

        $nb_slide=Slide::count();
        $nb_a_slide=Slide::where('etat',1)->count();
        $nb_d_slide=Slide::where('etat',"<>",1)->count();
        $nb_pa_slide=$nb_pd_slide=0;
        if($nb_slide>0){
            $nb_pa_slide=round(($nb_a_slide/$nb_slide)*100,2);
            $nb_pd_slide=round(($nb_d_slide/$nb_slide)*100,2);
        }
        
        $nb_form=Formation::count();
        $nb_a_form=Formation::where('etat',1)->count();
        $nb_d_form=Formation::where('etat',"<>",1)->count();
        $nb_pa_form=$nb_pd_form=0;
        if($nb_form>0){
            $nb_pa_form=round(($nb_a_form/$nb_form)*100,2);
            $nb_pd_form=round(($nb_d_form/$nb_form)*100,2);
        }        
        
        $nb_event=Evenement::count();
        $nb_a_event=Evenement::where('etat',1)->count();
        $nb_d_event=Evenement::where('etat',"<>",1)->count();
        $nb_pa_event=$nb_pd_event=0;
        if($nb_event>0){
            $nb_pa_event=round(($nb_a_event/$nb_event)*100,2);
            $nb_pd_event=round(($nb_d_event/$nb_event)*100,2);
        }

        $nb_event=Evenement::count();
        $nb_a_event=Evenement::where('etat',1)->count();
        $nb_d_event=Evenement::where('etat',"<>",1)->count();
        $nb_pa_event=$nb_pd_event=0;
        if($nb_event>0){
            $nb_pa_event=round(($nb_a_event/$nb_event)*100,2);
            $nb_pd_event=round(($nb_d_event/$nb_event)*100,2);
        }

        $nb_mesg=Message::count();
        $nb_a_mesg=Message::count();
        $nb_d_mesg=0;
        $nb_pa_mesg=$nb_pd_mesg=0;
        if($nb_mesg>0){
            $nb_pa_mesg=round(($nb_a_mesg/$nb_mesg)*100,2);
            $nb_pd_mesg=round(($nb_d_mesg/$nb_mesg)*100,2);
        }

        $nb_ens=Enseignant::count();
        $nb_a_ens=Enseignant::where('etat',1)->count();
        $nb_d_ens=Enseignant::where('etat',"<>",1)->count();
        $nb_pa_ens=$nb_pd_ens=0;
        if($nb_ens>0){
            $nb_pa_ens=round(($nb_a_ens/$nb_ens)*100,2);
            $nb_pd_ens=round(($nb_d_ens/$nb_ens)*100,2);
        }
        
        $nb_membre=Membre::count();
        $nb_a_membre=Membre::where('etat',1)->count();
        $nb_d_membre=Membre::where('etat',"<>",1)->count();
        $nb_pa_membre=$nb_pd_membre=0;
        if($nb_membre>0){
            $nb_pa_membre=round(($nb_a_membre/$nb_membre)*100,2);
            $nb_pd_membre=round(($nb_d_membre/$nb_membre)*100,2);
        }

        $nb_img=GalerieImage::count();
        $nb_a_img=GalerieImage::where('etat',1)->count();
        $nb_d_img=GalerieImage::where('etat',"<>",1)->count();
        $nb_pa_img=$nb_pd_img=0;
        if($nb_img>0){
            $nb_pa_img=round(($nb_a_img/$nb_img)*100,2);
            $nb_pd_img=round(($nb_d_img/$nb_img)*100,2);
        }

        $nb_video=GalerieVideo::count();
        $nb_a_video=GalerieVideo::where('etat',1)->count();
        $nb_d_video=GalerieVideo::where('etat',"<>",1)->count();
        $nb_pa_video=$nb_pd_video=0;
        if($nb_video>0){
            $nb_pa_video=round(($nb_a_video/$nb_video)*100,2);
            $nb_pd_video=round(($nb_d_video/$nb_video)*100,2);
        }

        $nb_fich=GalerieVideo::count();
        $nb_a_fich=GalerieVideo::where('etat',1)->count();
        $nb_d_fich=GalerieVideo::where('etat',"<>",1)->count();
        $nb_pa_fich=$nb_pd_fich=0;
        if($nb_fich>0){
            $nb_pa_fich=round(($nb_a_fich/$nb_fich)*100,2);
            $nb_pd_fich=round(($nb_d_fich/$nb_fich)*100,2);
        }

        //dd($nb_d_pages);
        //dd($nb_pd_pages);
        View::share(
            [
                 'nb_cat'=>$nb_cat,

                 'nb_activites'=>$nb_activites,
                 'nb_a_activites'=>$nb_a_activites,
                 'nb_d_activites'=>$nb_d_activites,
                 'nb_pa_activites'=>$nb_pa_activites,
                 'nb_pd_activites'=>$nb_pd_activites,

                 'nb_pages'=>$nb_pages,
                 'nb_a_pages'=>$nb_a_pages,
                 'nb_d_pages'=>$nb_d_pages,
                 'nb_pa_pages'=>$nb_pa_pages,
                 'nb_pd_pages'=>$nb_pd_pages,
                 
                 'nb_com'=>$nb_com,
                 'nb_a_com'=>$nb_a_com,
                 'nb_d_com'=>$nb_d_com,
                 'nb_pa_com'=>$nb_pa_com,
                 'nb_pd_com'=>$nb_pd_com,

                 'nb_slide'=>$nb_slide,
                 'nb_a_slide'=>$nb_a_slide,
                 'nb_d_slide'=>$nb_d_slide,
                 'nb_pa_slide'=>$nb_pa_slide,
                 'nb_pd_slide'=>$nb_pd_slide,

                 'nb_form'=>$nb_form,
                 'nb_a_form'=>$nb_a_form,
                 'nb_d_form'=>$nb_d_form,
                 'nb_pa_form'=>$nb_pa_form,
                 'nb_pd_form'=>$nb_pd_form,

                 'nb_event'=>$nb_event,
                 'nb_a_event'=>$nb_a_event,
                 'nb_d_event'=>$nb_d_event,
                 'nb_pa_event'=>$nb_pa_event,
                 'nb_pd_event'=>$nb_pd_event,

                 'nb_mesg'=>$nb_mesg,
                 'nb_a_mesg'=>$nb_a_mesg,
                 'nb_d_mesg'=>$nb_d_mesg,
                 'nb_pa_mesg'=>$nb_pa_mesg,
                 'nb_pd_mesg'=>$nb_pd_mesg,

                 'nb_ens'=>$nb_ens,
                 'nb_a_ens'=>$nb_a_ens,
                 'nb_d_ens'=>$nb_d_ens,
                 'nb_pa_ens'=>$nb_pa_ens,
                 'nb_pd_ens'=>$nb_pd_ens,

                 'nb_membre'=>$nb_membre,
                 'nb_a_membre'=>$nb_a_membre,
                 'nb_d_membre'=>$nb_d_membre,
                 'nb_pa_membre'=>$nb_pa_membre,
                 'nb_pd_membre'=>$nb_pd_membre,

                 'nb_img'=>$nb_img,
                 'nb_a_img'=>$nb_a_img,
                 'nb_d_img'=>$nb_d_img,
                 'nb_pa_img'=>$nb_pa_img,
                 'nb_pd_img'=>$nb_pd_img,

                 'nb_video'=>$nb_video,
                 'nb_a_video'=>$nb_a_video,
                 'nb_d_video'=>$nb_d_video,
                 'nb_pa_video'=>$nb_pa_video,
                 'nb_pd_video'=>$nb_pd_video,

                 'nb_fich'=>$nb_fich,
                 'nb_a_fich'=>$nb_a_fich,
                 'nb_d_fich'=>$nb_d_fich,
                 'nb_pa_fich'=>$nb_pa_video,
                 'nb_pd_fich'=>$nb_pd_fich,

                ]);*/
                $nb_activites=$nb_users=null;
        return view('admin.dashboard',compact('nb_activites','nb_users'));
    }
    function userCheck()
    {
        if(!(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperU') || Auth::user()->hasRole('Redacteur')))
        {
            //dd('Utilisateur non autorisé');
            //exit(0);
        }
    }
}
