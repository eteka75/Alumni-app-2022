<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Filiere;
use App\Models\Entite;
use Illuminate\Http\Request;
use Auth;

class FiliereController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        $nb=$perPage=in_array($perPage,$tab)? $perPage:10;
        if($nb<=5){$nb=5;}
        
        $order=in_array( $order,$orders)? $order:"DESC";
        $o=$request->input('order');
        $uid = $request->user()->id;

        if (!empty($keyword)) {
             if (Auth::user()->hasRole('SuperU')) {
                $filiere = Filiere::where('user_id',$uid)
                ->where('nom', 'LIKE', "%$keyword%")
                ->orWhere('sigle', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('entite_id', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
                  }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                 $filiere = Filiere::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('sigle', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('entite_id', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
            } 
        } else {
             if (Auth::user()->hasRole('SuperU')) {
                $filiere = Filiere::orderBy("id",$order)->paginate($perPage);
               }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                $filiere = Filiere::where('user_id',$uid)
                ->orderBy("id",$order)->paginate($perPage); 
            }
        }
        return view('admin.filiere.index', compact('filiere','nb','order','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $entites=Entite::where('etat',true)->pluck('sigle','id')->take(22)->prepend([''=>"-Sélectionnez-"]);
      
        if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){  

        return view('admin.filiere.create',compact('entites'));
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
			'nom' => 'required',
			'sigle' => 'required',
			#'user_id' => 'required',
			'etat' => 'required',
			'entite_id' => 'required|exists:entites,id'
		]);
        $requestData = $request->all();
        $uid = $request->user()->id;
        $requestData[ 'user_id']=$uid;
        
        Filiere::create($requestData);

        return redirect('admin/filiere')->with('flash_message', 'Filiere ajouté(e) avec succès !');
       
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
         $entites=Entite::where('etat',true)->pluck('sigle','id')->prepend([''=>"-Sélectionnez-"]);;
       
        
        if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){            
            $filiere = Filiere::findOrFail($id);

            return view('admin.filiere.show', compact('filiere','entites'));
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
        $entites=Entite::where('etat',true)->pluck('sigle','id')->prepend([''=>"-Sélectionnez-"]);;
       
        if($this->is_SuperU() ){ 
            $filiere = Filiere::findOrFail($id);
            return view('admin.filiere.edit', compact('filiere','entites'));
         }
         elseif($this->is_Red() || $this->is_Admin()){
            $uid = Auth::user()->id;
            $filiere = Filiere::where('user_id',$uid)->findOrFail($id);
            return view('admin.filiere.edit', compact('filiere','entites'));
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
			'nom' => 'required',
			'sigle' => 'required',
			#'user_id' => 'required',
			'etat' => 'required',
			'entite_id' => 'required|exists:entites,id'
		]);
            $requestData = $request->all();
            
            $filiere = Filiere::findOrFail($id);
            $filiere->update($requestData);

            return redirect('admin/filiere')->with('flash_message', 'Mise à jour effectuée avec succès !');
         }
         elseif($this->is_Red() || $this->is_Admin()){   
            $uid = $request->user()->id;           
            $this->validate($request, [
			'nom' => 'required',
			'sigle' => 'required',
			#'user_id' => 'required',
			'etat' => 'required',
			'entite_id' => 'required|exists:entites,id'
		]);
            $requestData = $request->all();
            
            $filiere = Filiere::where('user_id',$uid)->findOrFail($id);
            $filiere->update($requestData);

            return redirect('admin/filiere')->with('flash_message', 'Mise à jour effectuée avec succès !');
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
        Filiere::destroy($id);
        return redirect('admin/filiere')->with('flash_message', 'Filiere supprimé(e) avec succès !');
        }
        elseif($this->is_Red() || $this->is_Admin()){  
            Filiere::where('user_id',$uid)->where('id',$id)->delete();

        return redirect('admin/filiere')->with('flash_message', 'Filiere supprimé(e) avec succès !');
        }else{
             return "Opération non autorisée !";
        }
    }
}
