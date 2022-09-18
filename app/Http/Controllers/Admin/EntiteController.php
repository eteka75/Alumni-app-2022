<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Entite;
use Illuminate\Http\Request;
use Auth;

class EntiteController extends Controller
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
        $entite=[];
        if (!empty($keyword)) {
             if (Auth::user()->hasRole('SuperU')) {
                $entite = Entite::where('user_id',$uid)
                ->where('nom', 'LIKE', "%$keyword%")
                ->orWhere('sigle', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
                  }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                 $entite = Entite::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('sigle', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
            } 
        } else {
             if (Auth::user()->hasRole('SuperU')) {
                $entite = Entite::orderBy("id",$order)->paginate($perPage);
               }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                $entite = Entite::where('user_id',$uid)
                ->orderBy("id",$order)->paginate($perPage); 
            }
        }
        return view('admin.entite.index', compact('entite','nb','order','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){  
        return view('admin.entite.create');
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
			'etat' => 'required'
		]);
        $requestData = $request->all();
        $uid = $request->user()->id;
        $requestData[ 'user_id']=$uid;
        
        Entite::create($requestData);

        return redirect('admin/entite')->with('flash_message', 'Entite ajouté(e) avec succès !');
       
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
            $entite = Entite::findOrFail($id);

            return view('admin.entite.show', compact('entite'));
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
        if($this->is_SuperU() ){ 
            $entite = Entite::findOrFail($id);
            return view('admin.entite.edit', compact('entite'));
         }
         elseif($this->is_Red() || $this->is_Admin()){
            $uid = Auth::user()->id;
            $entite = Entite::where('user_id',$uid)->findOrFail($id);
            return view('admin.entite.edit', compact('entite'));
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
			'etat' => 'required'
		]);
            $requestData = $request->all();
            
            $entite = Entite::findOrFail($id);
            $entite->update($requestData);

            return redirect('admin/entite')->with('flash_message', 'Mise à jour effectuée avec succès !');
         }
         elseif($this->is_Red() || $this->is_Admin()){   
            $uid = $request->user()->id;           
            $this->validate($request, [
			'nom' => 'required',
			'sigle' => 'required',
			'etat' => 'required'
		]);
            $requestData = $request->all();
            
            $entite = Entite::where('user_id',$uid)->findOrFail($id);
            $entite->update($requestData);

            return redirect('admin/entite')->with('flash_message', 'Mise à jour effectuée avec succès !');
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
        Entite::destroy($id);
        return redirect('admin/entite')->with('flash_message', 'Entite supprimé(e) avec succès !');
        }
        elseif($this->is_Red() || $this->is_Admin()){  
            Entite::where('user_id',$uid)->where('id',$id)->delete();

        return redirect('admin/entite')->with('flash_message', 'Entite supprimé(e) avec succès !');
        }else{
             return "Opération non autorisée !";
        }
    }
}
