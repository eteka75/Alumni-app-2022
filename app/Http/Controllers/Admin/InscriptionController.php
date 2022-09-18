<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Inscription;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;

class InscriptionController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {        
        View::share('page', 'inscription');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $perPage =  $request->input('nb');
        $order =  strtoupper($request->input('order'));
        $search =  $keyword;
        $tab=[5,10,20,30];
        $orders=["ASC","DESC"];
        $nb=$perPage=in_array($perPage,$tab)? $perPage:5;
        if($nb<=5){$nb=5;}
        $order=in_array( $order,$orders)? $order:"DESC";
        $o=$request->input('order');
        
        $uid = $request->user()->id;

        if (!empty($keyword)) {
             if (Auth::user()->hasRole('SuperU')) {
                $inscription = Inscription::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('sexe', 'LIKE', "%$keyword%")
                ->orWhere('date_naissance', 'LIKE', "%$keyword%")
                ->orWhere('lieu_naissance', 'LIKE', "%$keyword%")
                ->orWhere('contact', 'LIKE', "%$keyword%")
                ->orWhere('nom_pere', 'LIKE', "%$keyword%")
                ->orWhere('nom_mere', 'LIKE', "%$keyword%")
                ->orWhere('contact_parents', 'LIKE', "%$keyword%")
                ->orWhere('nom_tuteur', 'LIKE', "%$keyword%")
                ->orWhere('contact_tuteur', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('formartion_id', 'LIKE', "%$keyword%")
                ->orWhere('classe', 'LIKE', "%$keyword%")
                ->orWhere('acte_de_naissance', 'LIKE', "%$keyword%")
                ->orWhere('dernier_bulletin', 'LIKE', "%$keyword%")
                ->orWhere('certificat', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
                  }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                 $inscription = Inscription::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('sexe', 'LIKE', "%$keyword%")
                ->orWhere('Date de naissance', 'LIKE', "%$keyword%")
                ->orWhere('lieu_naissance', 'LIKE', "%$keyword%")
                ->orWhere('contact', 'LIKE', "%$keyword%")
                ->orWhere('nom_pere', 'LIKE', "%$keyword%")
                ->orWhere('nom_mere', 'LIKE', "%$keyword%")
                ->orWhere('contact_parents', 'LIKE', "%$keyword%")
                ->orWhere('nom_tuteur', 'LIKE', "%$keyword%")
                ->orWhere('contact_tuteur', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('formartion_id', 'LIKE', "%$keyword%")
                ->orWhere('classe', 'LIKE', "%$keyword%")
                ->orWhere('acte_de_naissance', 'LIKE', "%$keyword%")
                ->orWhere('dernier_bulletin', 'LIKE', "%$keyword%")
                ->orWhere('certificat', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
            } 
        } else {
             if (Auth::user()->hasRole('SuperU')) {
                $inscription = Inscription::orderBy("id",$order)->paginate($perPage);
               }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                $inscription = Inscription::orderBy("id",$order)->paginate($perPage); 
            }
        }
        return view('admin.inscription.index', compact('inscription','nb','order','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){  
            return view('admin.inscription.create');
         }else{
             return "Opération non autorisée !";
         }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
         if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){  
        
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
        $uid = $request->user()->id;
        $requestData[ 'user_id']=$uid;
        
        Inscription::create($requestData);

        return redirect('admin/inscription')->with('flash_message', 'Inscription ajouté(e) avec succès !');
       
         }else{
             return "Opération non autorisée !";
         }
    }

    public function is_Admin(){
        return (Auth::check() &&  Auth::user()->hasRole('Admin'));
    }
    public function is_Red(){
        return (Auth::check() &&  Auth::user()->hasRole('Redacteur'));
    }
    public function is_SuperU(){
        return (Auth::check() &&  Auth::user()->hasRole('SuperU'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        
        if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){            
            $inscription = Inscription::findOrFail($id);

            return view('admin.inscription.show', compact('inscription'));
        }else{
             return "Opération non autorisée !";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
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
       
        if($this->is_SuperU() ){ 
            $inscription = Inscription::findOrFail($id);
            //dd($inscription);
            return view('admin.inscription.edit', compact('inscription','classes','formations'));
         }
         elseif($this->is_Red() || $this->is_Admin()){
            $uid = Auth::user()->id;
            $inscription = Inscription::where('user_id',$uid)->findOrFail($id);
            return view('admin.inscription.edit', compact('inscription','classes','formations'));
         }else{
             return "Opération non autorisée !";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
         if($this->is_SuperU() ){           
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
                /*'acte_de_naissance' => 'required|mimes:jpg,jpeg,png,pdf|max:10000',
                'dernier_bulletin' => 'required|mimes:pdf|max:10000',
                'certificat' => 'required|mimes:pdf|max:10000',
                'photo' => 'required|mimes:jpg,jpeg,bmp,png,gif|max:5000'*/
		]);
            $requestData = $request->all();
            
            $inscription = Inscription::findOrFail($id);
            $inscription->update($requestData);

            return redirect('admin/inscription')->with('flash_message', 'Mise à jour effectuée avec succès !');
         }
         elseif($this->is_Red() || $this->is_Admin()){   
            $uid = $request->user()->id;           
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
                 /*'acte_de_naissance' => 'required|mimes:jpg,jpeg,png,pdf|max:10000',
                'dernier_bulletin' => 'required|mimes:pdf|max:10000',
                'certificat' => 'required|mimes:pdf|max:10000',
                'photo' => 'required|mimes:jpg,jpeg,bmp,png,gif|max:5000'*/
		]);
            $requestData = $request->all();
            
            $inscription = Inscription::where('user_id',$uid)->findOrFail($id);
            $inscription->update($requestData);

            return redirect('admin/inscription')->with('flash_message', 'Mise à jour effectuée avec succès !');
         }else{
             return "Opération non autorisée !";
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $uid = Auth::user()->id;
        if($this->is_SuperU() ){     
        Inscription::destroy($id);
        return redirect('admin/Inscription')->with('flash_message', 'Inscription supprimé(e) avec succès !');
        }
        elseif($this->is_Red() || $this->is_Admin()){  
            Inscription::where('id',$id)->delete();

        return redirect('admin/Inscription')->with('flash_message', 'Inscription supprimé(e) avec succès !');
        }else{
             return "Opération non autorisée !";
        }
    }
}
