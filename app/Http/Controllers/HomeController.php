<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Filiere;
use App\Models\Entite;
use App\Models\Secteur;
use App\Models\Poste;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if((Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperU')))
        {
            return redirect()->to('admin')->with('flash_message',"Connexion réussie");
        }else{
            return redirect()->to(route('enregistrement1'));
        }
        dd('..............');
       // return view('home');
    }
    
    public function VerifierEtape(){
        $etape=1+(int)Auth::user()->step;
        if($etape==1){
            return redirect()->to(route('enregistrement1'));
        }elseif($etape==2){
            return redirect()->to(route('enregistrement2'));            
        }
        elseif($etape==3){
            return redirect()->to(route('enregistrement3'));
        }
        return redirect()->to(('user/profil'));
    }
    public function Enregistrement()
    {
        if(Auth::user()->step>=0) {
            return $this->VerifierEtape();
        }
        return redirect()->back()->with('flash_message',"Une erreur est survenue lors de l'enrégistrement");

    }

    public function Enregistrement1(){
        if(Auth::user()->step>=1) {
            return $this->VerifierEtape();
        }
        
        $etablissements=Entite::where('etat',1)->pluck('nom','id')->prepend('-Sélectionnez-','')->toArray();
        $filieres=Filiere::where('etat',true)->pluck('nom','id')->prepend('-Sélectionnez-','')->toArray();
        //dd($etablissements);
        return view('auth.enregistrement1',compact('etablissements','filieres'));
    }
    public function Enregistrement2(){
        $this->VerifierEtape();
        $secteurs=Secteur::pluck('nom','id')->prepend("Sélectionnez secteur");//orderBy('nom')->
        //dd($secteurs);
        return view('auth.enregistrement2',compact("secteurs"));
    }
    public function Enregistrement3(){
        
        return view('auth.enregistrement3');
    }
    public function SaveEnregistrement1(Request $request){

        if(Auth::user()->step>=1) {
            return $this->VerifierEtape();
        }
        $this->validate($request, [
            'sexe' => 'required|in:F,M',
            'photo' => 'image|mimes:mimes:jpg,jpeg,png,gif,tiff|max:4096',
            'telephone' => 'required',
            'telephone' => ['required', 'min:8', 'regex:%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i','max:50'],
            'age' => 'required|integer|min:18|max:100',
            'site_web' => 'nullable|url',
            'annee_academique' => 'required|regex:/^[0-9]{4}+-[0-9]{4}+$/i',
            'etablissement_id' => 'required|exists:entites,id',
            'filiere_id' => 'required|exists:filieres,id',
            'diplome' => 'required|in:LICENCE,MASTER,DOCTORAT,AUTRE',
            'theme_memoire' => 'max:2000',
           # 'etat' => 'required'
        ],
        $messages = [
            'mimes' => 'Veuillez choisir une photo de moins de 4Mo',
        ]);
        $requestData = $request->all();      
        $default="storage/disk/photo-profil/default.jpg";
            $url='storage/disk/photo-profil/';
            if ($request->hasFile('photo')) {
                if($file=$request['photo'] ){
                    $uploadPath = ($url);
    
                    $extension = $file->getClientOriginalExtension();
                    $fileName = $url. rand(11111, 99999) . '_profil_'.time().'.' . $extension;
    
                    $file->move($uploadPath, $fileName);
                    Auth()->user()->update(['profile_photo_path'=>$fileName]);
                   
                    # $filename = $request->image->getClientOriginalName();
                    # $request->image->storeAs('images',$filename,'public');
                    
                    //$requestData['format'] =strtoupper($extension);
                }
            }else{
              //  Auth()->user()->update(['profile_photo_path'=>$default]);
            }
            //dd(Auth()->user());
            $uid = $request->user()->id;
            $etape = 1+ (int)$request->user()->step;
           // dd($etape);
      
        $formation=[
            'annee_academique'=>$request->input('annee_academique'),
            'etablissement_id'=>$request->input('etablissement_id'),
            'filiere_id'=>$request->input('filiere_id'),
            'diplome'=>$request->input('diplome'),
            'theme_memoire'=>$request->input('theme_memoire'),
            'membre_id'=>$uid,
        ];
        //dd($formation);
        Formation::create($formation);
        Auth()->user()->update(['step'=>$etape]);
        return redirect()->to(route('enregistrement2'));
    }

    public function SaveEnregistrement2(Request $request){
        if(Auth::user()->step>=2) {
            return $this->VerifierEtape();
        }
        
        $this->validate($request, [
            'fonction' => 'required|max:200',
            'structure' => 'required|max:150',
            'secteur_id' => 'required|integer|exists:secteurs,id',
            'contact' => 'nullable|max:200',
            'lieu_poste' => 'nullable|max:200',
            'annee_poste' => 'required|regex:/^[0-9]{4}+$/i',
            'site_web' => 'nullable|url',
            'renseignements' => 'max:2000',
            # 'etat' => 'required'
        ],
        $messages = [
            'mimes' => 'Veuillez choisir une photo de moins de 4Mo',
        ]);
        
            $uid = $request->user()->id;
            //$etape = 1+ (int)$request->user()->step;
            $etape = 2;
           // dd($etape);
      
        $poste=[
            'fonction'=>$request->input('fonction'),
            'structure'=>$request->input('structure'),
            'annee_poste'=>$request->input('annee_poste'),
            'secteur_id'=>$request->input('secteur_id'),
            'contact'=>$request->input('contact'),
            'lieu_poste'=>$request->input('lieu_poste'),
            'site_web'=>$request->input('site_web'),
            'renseignements'=>$request->input('renseignements'),
            'membre_id'=>$uid,
        ];
       // dd($poste);
        Poste::create($poste);
        Auth()->user()->update(['step'=>$etape]);
        return redirect()->to(route('enregistrement3'));
    }
    public function SaveEnregistrement3(Request $request){
        $this->validate($request, [
            'email_public' => 'nullable|in:0,1',
            'occupation_visible' => 'nullable|in:0,1',
            'recevoir_notification_collegue' => 'nullable|in:0,1',
            'recevoir_notification_opportunites' => 'nullable|in:0,1',
            'recevoir_newsletters' => 'nullable|in:0,1',
            # 'etat' => 'required'
        ]);
        $data=[
            'email_public'=>$request->input('email_public'),
            'occupation_visible'=>$request->input('occupation_visible'),
            'recevoir_notification_collegue'=>$request->input('recevoir_notification_collegue'),
            'recevoir_notification_opportunites'=>$request->input('recevoir_notification_opportunites'),
            'recevoir_newsletters'=>$request->input('recevoir_newsletters'),
        ];

        $data=json_encode($data);
        $newstep=3;
        Auth()->user()->update(['preferences'=>$data,'step'=>$newstep]);

        //dd(Auth()->user());
        if(Auth()->user()->step>=3){

                    return redirect()->to(url('user/profil'));//->withInputs();
        }else{
            return redirect()->back()->with('flash_message',"Une erreur est survenue au cours de l'enrégistrement des paramètres. Veuillez contacter l'administrateur de la plateforme.");
        }
       // dd($request);
    }
   
}