<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use Auth;
use Str;

class EnseignantController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        View::share('page', 'enseignant');
        $this->middleware('auth');
    }
    
    function userCheck()
    {
        if(!(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('SuperU') || Auth::user()->hasRole('Redacteur')))
        {
            dd('Utilisateur non autorisé');
            exit(0);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->userCheck();
        $keyword = $request->get('search');
        $perPage = 25;

        $perPage =  $request->input('nb');
        $order =  strtoupper($request->input('order'));
        $search =  $keyword;
        $tab=[5,10,20,30];
        $orders=["ASC","DESC"];
        $nb=$perPage=in_array($perPage,$tab)? $perPage:5;
        if($nb<=5){$nb=5;}
        $order=in_array( $order,$orders)? $order:"ASC";
        $o=$request->input('order');
        $uid = $request->user()->id;

        if (!empty($keyword)) {
             if (Auth::user()->hasRole('SuperU')) {
                $enseignant = Enseignant::where('user_id',$uid)
                ->where('site', 'LIKE', "%$keyword%")
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('sexe', 'LIKE', "%$keyword%")
                ->orWhere('specialite', 'LIKE', "%$keyword%")
                ->orWhere('ecole', 'LIKE', "%$keyword%")
                ->orWhere('poste', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('telephone', 'LIKE', "%$keyword%")
                ->orWhere('lien_facebook', 'LIKE', "%$keyword%")
                ->orWhere('lien_linkedin', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('biographie', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
                  }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                 $enseignant = Enseignant::where('site', 'LIKE', "%$keyword%")
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('sexe', 'LIKE', "%$keyword%")
                ->orWhere('specialite', 'LIKE', "%$keyword%")
                ->orWhere('ecole', 'LIKE', "%$keyword%")
                ->orWhere('poste', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('telephone', 'LIKE', "%$keyword%")
                ->orWhere('lien_facebook', 'LIKE', "%$keyword%")
                ->orWhere('lien_linkedin', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('biographie', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
            } 
        } else {
             if (Auth::user()->hasRole('SuperU')) {
                $enseignant = Enseignant::orderBy("id",$order)->paginate($perPage);
               }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                $enseignant = Enseignant::where('user_id',$uid)
                ->orderBy("id",$order)->paginate($perPage); 
            }
        }
        return view('admin.enseignant.index', compact('enseignant','nb','order','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->userCheck();
        if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){  
        return view('admin.enseignant.create');
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
        $this->userCheck();
         if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){  
        
        $this->validate($request, [
			'site' => 'required',
			'nom' => 'required',
			'prenom' => 'required',
			'photo' => 'image',
			'sexe' => 'required',
			'etat' => 'required'
		]);
        $requestData = $request->all();
        $uid = $request->user()->id;
        $requestData[ 'user_id']=$uid;
        $title = $request->input("titre");
        $requestData[ 'slug']=substr(Str::slug($title),0,150);        
        
        $url='storage/uploads/enseignants/';
        if ($request->hasFile('photo')) {
            if($file=$request['photo'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_enseignant.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['photo'] = $url.$fileName;
                //$requestData['format'] =strtoupper($extension);
            }
        }
        
        Enseignant::create($requestData);

        return redirect('admin/enseignant')->with('flash_message', 'Enseignant ajouté(e) avec succès !');
       
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
        $this->userCheck();
        
        if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){            
            $enseignant = Enseignant::findOrFail($id);

            return view('admin.enseignant.show', compact('enseignant'));
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
        $this->userCheck();
        if($this->is_SuperU() ){ 
            $enseignant = Enseignant::findOrFail($id);
            return view('admin.enseignant.edit', compact('enseignant'));
         }
         elseif($this->is_Red() || $this->is_Admin()){
            $uid = Auth::user()->id;
            $enseignant = Enseignant::where('user_id',$uid)->findOrFail($id);
            return view('admin.enseignant.edit', compact('enseignant'));
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
        $this->userCheck();
         if($this->is_SuperU() ){           
            $this->validate($request, [
			'site' => 'required',
			'nom' => 'required',
			'prenom' => 'required',
			'photo' => 'image',
			'sexe' => 'required',
			'etat' => 'required'
		]);
        $requestData = $request->all();
        $title = $request->input("titre");
        $requestData[ 'slug']=substr(Str::slug($title),0,150);        
        
        $url='storage/uploads/enseignants/';
        if ($request->hasFile('photo')) {
            if($file=$request['photo'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_enseignant.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['photo'] = $url.$fileName;
                //$requestData['format'] =strtoupper($extension);
            }
        }

        $enseignant = Enseignant::findOrFail($id);
        $enseignant->update($requestData);

        return redirect('admin/enseignant')->with('flash_message', 'Mise à jour effectuée avec succès !');
        }
         elseif($this->is_Red() || $this->is_Admin()){   
            $uid = $request->user()->id;           
            $this->validate($request, [
			'site' => 'required',
			'nom' => 'required',
			'prenom' => 'required',            
			'photo' => 'image',
			'sexe' => 'required',
			'etat' => 'required'
		]);
        $requestData = $request->all();
        $title = $request->input("titre");
        $requestData[ 'slug']=substr(Str::slug($title),0,150);        
    
        $url='storage/uploads/enseignants/';
        if ($request->hasFile('photo')) {
            if($file=$request['photo'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_enseignant.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['photo'] = $url.$fileName;
                //$requestData['format'] =strtoupper($extension);
            }
        }
        $enseignant = Enseignant::where('user_id',$uid)->findOrFail($id);
        $enseignant->update($requestData);

        return redirect('admin/enseignant')->with('flash_message', 'Mise à jour effectuée avec succès !');
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
        $this->userCheck();
        $uid = Auth::user()->id;
        if($this->is_SuperU() ){     
        Enseignant::destroy($id);
        return redirect('admin/enseignant')->with('flash_message', 'Enseignant supprimé(e) avec succès !');
        }
        elseif($this->is_Red() || $this->is_Admin()){  
            Enseignant::where('user_id',$uid)->where('id',$id)->delete();

        return redirect('admin/enseignant')->with('flash_message', 'Enseignant supprimé(e) avec succès !');
        }else{
             return "Opération non autorisée !";
        }
    }
}
