<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use App\Models\Formation;
use App\Models\Evenement;
use App\Models\Inscription;
use App\Models\GalerieImage;
use App\Models\GalerieVideo;
use App\Models\Activite;
use App\Models\Enseignant;
use App\Models\Membre;
use App\Models\Poste;
use App\Models\Secteur;
use App\Models\Categorie;
use App\Models\Communique;
use App\Models\Message;
use App\Models\Fichier;
use App\Models\Slide;
use App\Models\User;
use App\Models\Avi;
use Auth;
use PDF;
use URL;

class Pagecontroller extends Controller
{
    public $site,$apropos;
    //static $apropos='mot-bienvenue';
    
    public function __construct()
    {
        $this->apropos='apropos-'.strtolower(config('app.site'));
        $this->mot='mot-bienvenue-'.strtolower(config('app.site'));
        $this->site =config('app.site')!=''?config('app.site'):'PARAKOU';
    }
    public function SetLang($lang='fr'){
            if (!in_array($lang, ['fr', 'en'])){
                $lang = 'fr';
            }
            Session::put('locale', $lang);
            return redirect(url(URL::previous()));
    }
    public function Index(){
        $page="accueil";
        $data=null;
        $nb_membre=8;
        $default_img=config('app.avatar.default');
        $membres=User::where('type','ALUMNI')->where('profile_photo_path','<>',$default_img)->orderBy('id','desc')->take($nb_membre)->get();
        //dd($membres->count());
        /*$slides=Slide::latest()->where('etat',1)->where('site',$this->site)->limit(8)->get();
        #$avis=Avi::latest()->where('etat',1)->where('site',$this->site)->limit(8)->get();
        $mot=Page::latest()->where('slug',$this->mot)->where('etat',1)->first();
        $formations=Formation::latest()->where('etat',1)->where('site',$this->site)->orderBy('site')->limit(8)->get();
        $activites=Activite::latest()->where('etat',1)->where('site',$this->site)->limit(6)->get();
        $enseignants=Enseignant::latest()->where('etat',1)->where('site',$this->site)->limit(8)->get();
        //dd($slides)
        //dd($mot);
        */
        $n_act=4;
        $activites=Activite::paginate($n_act);
        $nb_membre=User::where('type','ALUMNI')->count();
        $nb_opportunite=2;
        $nb_entreprise=2;
        $nb_activite=2;
        /*$nb_entreprise=Entreprise::where('etat',true)->count();
        $nb_opportunite=Opportunite::where('etat',true)->count();
        $nb_activite=Activite::where('etat',true)->count();*/

        return view('web.index',compact('page','membres','activites','nb_membre','nb_opportunite','nb_entreprise','nb_activite'));
        //return view('web.index',compact('data','page',"slides",'mot','formations','activites','enseignants'));
    }
    public function Faq(){
        $page="apropos";
        $data=null;
        return view('web.faq',compact('data','page'));
    }
    
    public function Apropos(){
        $page="apropos";
        $data=null;
        return view('web.apropos',compact('data','page'));
    }
    
    public function Annuaire(){
        $page="annuaire";
        $datas=null;
        $nb_user=10;
        $colBy="created_at";
        $trieBy="ASC";
       
       $datas=User::where('type','ALUMNI')->orderBy($colBy,$trieBy)->paginate($nb_user);
       //dd($datas);
        return view('web.annuaires',compact('datas','page'));
    }
    public function Partenaires(){
        $slug="historique-cotonou";
        $page="partenaires";
        $datas=null;
        //$datas=Page::latest()->where('slug',$slug)->firstOrFail();
       
        return view('web.partenaires',compact('datas','page'));
    }
    
   
   
    public function Carrieres(){
        $page="carrieres";
        $datas=null;
        //$datas=Page::latest()->where('slug',$slug)->firstOrFail();
       
        return view('web.carrieres',compact('datas','page'));
    }

    public function Opportunites(){
        $page="opportunites";
        $datas=null;
        //$datas=Page::latest()->where('slug',$slug)->firstOrFail();
       
        return view('web.opportunites',compact('datas','page'));
    }
    

    public function Page($slug){
        $id="apropos";
        $page="accueil";
        $data=Page::latest()->where('slug',$slug)->firstOrFail();
        if($data){
            $data=$data->toArray();
        }
        return view('web.page',compact('data','page'));
    }
    public function Actualite($slug){
        $id="apropos";
        $page="activites";
        $data=Activite::latest()->where('slug',$slug)->where('etat',1)->where('site',$this->site)->firstOrFail();
       if($data){
            $data=$data->toArray();
        }
        return view('web.activite',compact('data','page'));
    }
    
    public function Search(Request $request){

        $perPage=10;

        $keyword=$request->input('search');
        $search=$keyword;
        $datas=null;

        $page='accueil';

        $n=6;
        $datas = User::where('nom', 'LIKE', "%$keyword%")
        ->orWhere('prenom', 'LIKE', "%$keyword%")
        //->orWhere('poste', 'LIKE', "%$keyword%")
        //->orWhere('biographie', 'LIKE', "%$keyword%")
        ->paginate($perPage);

        return view('web.search',compact('datas','page','search'));
    }
    public function Activites(){
        $page="activites";
        $data=null;
        $datas=null;
        $n=6;
        return view('web.activites',compact('datas','page'));
    }
    public function Membres(){
        $page="apropos";
        $data=null;
        $datas=null;
        $datas=Membre::oldest()->where('etat',1)->where('site',$this->site)->paginate(10);
        if($datas){
           // $datas=$datas->toArray();
        }

        return view('web.membres',compact('datas','page'));
    }
    public function Membre($slug){
        $page="apropos";
        $data=null;
        $data=Membre::latest()->where('etat',1)->where('site',$this->site)->where('id',$slug)->first();
        $datas=Membre::where('etat',1)->where('site',$this->site)->inRandomOrder()->where('id','<>',$slug)->limit(6)->get();
        
        if(empty($data)){
            $data=Membre::inRandomOrder()->where('etat',1)->where('site',$this->site)->where('id',$slug)->firstOrFail();
           // $datas=$datas->toArray();
        }
        return view('web.membre',compact('data','page','datas'));
    }
    
    public function Formation($slug){
        $page="formations";
        $data=null;
        $data=Formation::latest()->where('etat',1)->where('site',$this->site)->where('slug',$slug)->first();
        $datas=Formation::where('etat',1)->where('site',$this->site)->where('id','<>',$slug)->inRandomOrder()->limit(4)->get();
        
        if(empty($data)){
            $data=Formation::latest()->where('etat',1)->where('site',$this->site)->where('id',$slug)->firstOrFail();
           // $datas=$datas->toArray();
        }
        return view('web.formation',compact('data','page','datas'));
    }
    public function Enseignants(){
        $page="apropos";
        $datas=null;
        $datas=Enseignant::latest()->where('etat',1)->where('site',$this->site)->paginate(10);
        if($datas){
           // $datas=$datas->toArray();
        }

        return view('web.enseignants',compact('datas','page'));
    }
    public function Enseignant($slug){
        $page="apropos";
        $data=null;
        $data=Enseignant::latest()->where('etat',1)->where('site',$this->site)->where('id',$slug)->first();
        $datas=Enseignant::latest()->where('etat',1)->where('site',$this->site)->where('id','<>',$slug)->inRandomOrder()->limit(4)->get();
        
        if(empty($data)){
            $data=Enseignant::latest()->where('etat',1)->where('site',$this->site)->where('id',$slug)->firstOrFail();
           // $datas=$datas->toArray();
        }
        
        return view('web.enseignant',compact('data','page','datas'));
    }
    public function Communiques(){
        $page="autres";
        $datas=null;
        $datas=Communique::latest()->where('etat',1)->where('site',$this->site)->paginate(12);
        if($datas){
           // $datas=$datas->toArray();
        }

        return view('web.communiques',compact('datas','page'));
    }
    public function Inscription(){
        $page="accueil";
        $formations=null;
        $formations=Formation::orderBy("titre")->pluck("titre",'id');
        //dd($formations);

        $classes=[
                    'Première Année'=>'Première Année',
                    'Deuxième Année'=>'Deuxième Année',
                    'Troisième Année'=>'Troisième Année',
                    'Seconde'=>'Seconde',
                    'Première'=>'Première',
                    'Terminale'=>'Terminale'
                ];
       
        return view('web.inscription',compact('formations','page','classes'));
    }
    public function Sinscrire(Request $request){

        $this->validate($request, [
			'nom' => 'required|min:2|max:250',
			'prenom' => 'required|min:2|max:250',
			'date_naissance' => 'required|date',
			'sexe' => 'required|in:M,F',
			'lieu_naissance' => 'required|min:2|max:250',
			'nom_pere' => 'required|min:2|max:250',
			'nom_mere' => 'required|min:2|max:250',
			'contact_parents' => 'required|min:2|max:250',
			'formation_id' => 'required|exists:formations,id',
			'classe' => 'required|in:Première Année,Deuxième Année,Troisième Année,Seconde,Première,Terminale',
			'acte_de_naissance' => 'required|mimes:jpg,jpeg,png,pdf|max:10000',
			'dernier_bulletin' => 'required|mimes:pdf|max:10000',
			'certificat' => 'required|mimes:pdf|max:10000',
			'photo' => 'required|mimes:jpg,jpeg,bmp,png,gif|max:5000'
		]);
        $requestData = $request->all();
        $code=$this->getRandId();
        $requestData['code']=$code;
        $requestData['site']=config('app.site');
        dd($requestData);

        $url="uploads/inscriptions/".date('Y')."/acte_de_naissance/";
        if ($request->hasFile('acte_de_naissance')) {
            if($file=$request['acte_de_naissance'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_acte_de_naissance.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['acte_de_naissance'] = $url.$fileName;
            }
        }
        $url="uploads/inscriptions/".date('Y')."/bulletins/";
        if ($request->hasFile('dernier_bulletin')) {
            if($file=$request['dernier_bulletin'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_dernier_bulletin.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['dernier_bulletin'] = $url.$fileName;
            }
        }
        $url="uploads/inscriptions/".date('Y')."/certificats/";
        if ($request->hasFile('certificat')) {
            if($file=$request['certificat'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_certificat.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['certificat'] = $url.$fileName;
            }
        }
        $url="uploads/inscriptions/".date('Y')."/photos/";
        if ($request->hasFile('photo')) {
            if($file=$request['photo'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_photo.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['photo'] = $url.$fileName;
            }
        }

       
        Inscription::create($requestData);

        return redirect('inscription/fiche?code='.$code)->with('flash_message', "Inscription effectuée avec succès. Votre code d'inscription est : <b>".$code."</b>");
       
    }
    public function getRandId($n=8){
        do{
            $v=strtoupper(Str::random($n));
        }while($ts=Inscription::where('code',$n)->count()>0);
        
        return $v;
    }
    public function Fiche(Request $request){

        /*$this->validate($request, [
			'code' => 'required|min:4|max:10',
        ]);*/
        $code =$request->input('code');
        $show =$request->input('show');
        $download =$request->input('download');
        $nom_etu="_";
        $etu=null;
        # $nom= \Str::slug("Fiche_inscription_".$code."_".$nom_etu);
        if($code){
            $etu=Inscription::where('code',$code)->first();
        }
        if($etu){
            $nom_etu=$etu->nom."_".$etu->prenom;
        }
        $nom= \Str::slug("Fiche_inscription_".$code."_".$nom_etu);
        $pdf = PDF::loadView('web.pdf', compact('etu'));

        if($etu && $show=='1'){
            return $pdf->stream();
        }

        if($etu && $download=='1'){
            return $pdf->download($nom.".pdf");
        }

        //Afficher
        
        //

        //Sauvegarder
        # $pdf->save(public_path("storage/documents/fichier.pdf"));
        // Lancement du téléchargement du fichier PDF
        # return $pdf->download(\Str::slug($post->title).".pdf");

        return view('web.fiche',compact('etu'));
    }
    
    public function Communique($slug)
    {
        $page="autres";
        $data=null;
        $data=Communique::latest()->where('etat',1)->where('site',$this->site)->where('slug',$slug)->first();
        $datas=Communique::latest()->where('etat',1)->where('site',$this->site)->where('id','<>',$slug)->inRandomOrder()->limit(4)->get();
        
        if(empty($data)){
            $data=Communique::latest()->where('etat',1)->where('site',$this->site)->where('id',$slug)->firstOrFail();
           // $datas=$datas->toArray();
        }
        return view('web.communique',compact('data','page','datas'));
    }
    public function Fichiers(){
        $page="autres";
        $datas=null;
        $datas=Fichier::latest()->where('etat',1)->where('site',$this->site)->paginate(10);
        if($datas){
           // $datas=$datas->toArray();
        }
        return view('web.fichiers',compact('datas','page'));
    }
    public function Fichier($slug){
        $page="autres";
        $data=null;
        $data=Fichier::latest()->where('etat',1)->where('site',$this->site)->where('slug',$slug)->first();
        $datas=Fichier::latest()->where('etat',1)->where('site',$this->site)->where('id','<>',$slug)->inRandomOrder()->limit(6)->get();
        
        if(empty($data)){
            $data=Fichier::latest()->where('etat',1)->where('site',$this->site)->where('id',$slug)->firstOrFail();
           // $datas=$datas->toArray();
        }
        return view('web.fichier',compact('data','page','datas'));
    }
    public function GImages(){
        $page="autres";
        $datas=null;
        $n=24;
        $datas=GalerieImage::latest()->where('etat',1)->where('site',$this->site)->paginate($n);
        if($datas){
           // $datas=$datas->toArray();
        }
        return view('web.galerie-images',compact('datas','page'));
    }
    public function GVideos(){
        $page="autres";
        $datas=null;
        $n=4;
        $datas=GalerieVideo::latest()->where('etat',1)->where('site',$this->site)->paginate($n);
        if($datas){
           // $datas=$datas->toArray();
        }

        return view('web.galerie-videos',compact('datas','page'));
    }
    public function Evenement($slug){
        $page="formations";
        $data=null;
        $data=Evenement::latest()->where('etat',1)->where('site',$this->site)->where('id',$slug)->first();
        $datas=Evenement::latest()->where('etat',1)->where('site',$this->site)->where('id','<>',$slug)->inRandomOrder()->limit(4)->get();
        
        if(empty($data)){
            $data=Formation::latest()->where('etat',1)->where('site',$this->site)->where('id',$slug)->firstOrFail();
           // $datas=$datas->toArray();
        }
        return view('web.evenement',compact('data','page','datas'));
    }
    public function Evenements(){
        $page="autres";
        $data=null;
        $datas=Evenement::latest()->where('etat',1)->where('site',$this->site)->paginate(4);
        
        return view('web.evenements',compact('data','page','datas'));
    }
    
    public function Categories(){
        $page="activites";
        $data=null;
        $datas=Categorie::orderBy('nom','ASC')->where('site',$this->site)->paginate(4);
        
        return view('web.categories',compact('data','page','datas'));
    }
    public function Categorie($slug){
        $page="activites";
        $data=null;
        $n=6;
        $data=Categorie::where('id',$slug)->first();
        $activites=Activite::where('categorie_id',$slug)->paginate($n);
        $datas=Categorie::where('id','<>',$slug)->inRandomOrder()->limit(4)->get();
        
       
        return view('web.categorie',compact('activites','page',"data",'datas'));
    }
    public function Formations(){
        $page="formations";
        $datas=null;
        $n=10;
        $datas=Formation::latest()->where('etat',1)->where('site',$this->site)->paginate($n);
        
        return view('web.formations',compact('datas','page'));
    }
    public function Contact(){
        $page="contact";
        $data=null;
        return view('web.contact',compact('data','page'));
    }
    public function contacter(Request $request){

        
    }
    public function postContact(Request $request){
         
        $this->validate($request, [
			
			'objet' => 'required|min:2|max:100',
			'telephone' => 'max:100',
			'nom' => 'required|min:4|max:100',
			'email' => 'email|required|max:100',
			'message' => 'required|max:1000'
		]);
        $requestData = $request->all();
        if(Auth::user()){

            $uid = $request->user()->id;
        }else{
            $uid=0;
        }
        
        $requestData['user_id']=$uid;
        Message::create($requestData);
        return redirect("/")->with('flash_message', 'Message envoyé avec succès !');
      
    }
public function verifierEtape($user){
    if($user){
        $e=$user->step;
        if($e<=1){
            return redirect()->to(route('enregistrement1'));
        }
        elseif($e>=2){
            return redirect()->to(route('enregistrement2'));
        }
        elseif($e>2){
            return redirect()->to(route('enregistrement3'));
        }

    }
    return back();
}
    public function ProfilUser($username=""){
        $user=User::where('username',$username)->firstOrFail();
        $poste=null;
        //$poste=$user->getPoste();//with('poste')->
        //$poste=$poste->toArray();

        if($user){
            $poste=Poste::where('membre_id',$user->id)->first();
        }else{
            abort(404);
            //return redirect('/login')->with('flash_message',"Veuillez vous connecter à votre compte");
        }
        //dd($poste);
        return view('web.user.profil',compact('user','poste'));
    }
    public function Profil(){
        
        $user=Auth::user();
        if(Auth::user()){
            $etape=$user->step;
            $uid=Auth::user()->id;
            return redirect(route('uprofil',$user->username)); 
         }else{
             abort(404);
         }
        if($etape==3){
            $poste=Poste::where('membre_id',$uid)->first();//->with('poste');
            //$poste=Poste::where('user_id',$uid)->with('poste');
            //dd($user);
            
            return view('web.user.profil',compact('user','poste'));
        }else{
            return $this->verifierEtape($user);
        }
       
    }

   
}
