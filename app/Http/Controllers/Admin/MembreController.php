<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests;

use App\Models\Membre;
use Illuminate\Http\Request;
use Auth;
use Str;

class MembreController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        View::share('page', 'membre');
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
                $membre = Membre::where('user_id',$uid)
                ->where('site', 'LIKE', "%$keyword%")
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('Sexe', 'LIKE', "%$keyword%")
                ->orWhere('poste', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('telephone', 'LIKE', "%$keyword%")
                ->orWhere('biographie', 'LIKE', "%$keyword%")
                ->orWhere('lien_facebook', 'LIKE', "%$keyword%")
                ->orWhere('lien_linkedin', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
                  }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                 $membre = Membre::where('site', 'LIKE', "%$keyword%")
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('Sexe', 'LIKE', "%$keyword%")
                ->orWhere('poste', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('telephone', 'LIKE', "%$keyword%")
                ->orWhere('biographie', 'LIKE', "%$keyword%")
                ->orWhere('lien_facebook', 'LIKE', "%$keyword%")
                ->orWhere('lien_linkedin', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
            } 
        } else {
             if (Auth::user()->hasRole('SuperU')) {
                $membre = Membre::orderBy("id",$order)->paginate($perPage);
               }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                $membre = Membre::where('user_id',$uid)
                ->orderBy("id",$order)->paginate($perPage); 
            }
        }
        return view('admin.membre.index', compact('membre','nb','order','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){  
        return view('admin.membre.create');
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
			'site' => 'required',
			'nom' => 'required',
			'prenom' => 'required',
			'sexe' => 'required',
            'photo' =>'image',
            'etat' => 'required|in:1,0'
        ]);
        $requestData = $request->all();
        #$title = $request->input("titre");
        $uid = $request->user()->id;
        $requestData[ 'user_id']=$uid;
        #$requestData[ 'slug']=substr(Str::slug($title),0,150);        
        
        $url='storage/uploads/membres/';
        if ($request->hasFile('photo')) {
            if($file=$request['photo'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_photo.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['photo'] = $url.$fileName;
                //$requestData['format'] =strtoupper($extension);
            }
        }
        $requestData = $request->all();
        $uid = $request->user()->id;
        $requestData[ 'user_id']=$uid;
        
        Membre::create($requestData);

        return redirect('admin/membre')->with('flash_message', 'Membre ajouté(e) avec succès !');
       
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
            $membre = Membre::findOrFail($id);

            return view('admin.membre.show', compact('membre'));
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
            $membre = Membre::findOrFail($id);
            return view('admin.membre.edit', compact('membre'));
         }
         elseif($this->is_Red() || $this->is_Admin()){
            $uid = Auth::user()->id;
            $membre = Membre::where('user_id',$uid)->findOrFail($id);
            return view('admin.membre.edit', compact('membre'));
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
                'site' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
                'sexe' => 'required',
                'photo' =>'image',
                'etat' => 'required|in:1,0'
            ]);
            $requestData = $request->all();
            #$title = $request->input("titre");
            $uid = $request->user()->id;
            $requestData[ 'user_id']=$uid;
            #$requestData[ 'slug']=substr(Str::slug($title),0,150);        
            
            $url='storage/uploads/membres/';
            if ($request->hasFile('photo')) {
                if($file=$request['photo'] ){
                    $uploadPath = ($url);
    
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(11111, 99999) . '_photo.' . $extension;
    
                    $file->move($uploadPath, $fileName);
                    $requestData['photo'] = $url.$fileName;
                    //$requestData['format'] =strtoupper($extension);
                }
            }
            
            $membre = Membre::findOrFail($id);
            $membre->update($requestData);

            return redirect('admin/membre')->with('flash_message', 'Mise à jour effectuée avec succès !');
         }
         elseif($this->is_Red() || $this->is_Admin()){   
            $this->validate($request, [
                'site' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
                'sexe' => 'required',
                'photo' =>'image',
                'etat' => 'required|in:1,0'
            ]);
            $requestData = $request->all();
            #$title = $request->input("titre");
            $uid = $request->user()->id;
            $requestData[ 'user_id']=$uid;
            #$requestData[ 'slug']=substr(Str::slug($title),0,150);        
            
            $url='storage/uploads/membres/';
            if ($request->hasFile('photo')) {
                if($file=$request['photo'] ){
                    $uploadPath = ($url);
    
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(11111, 99999) . '_photo.' . $extension;
    
                    $file->move($uploadPath, $fileName);
                    $requestData['photo'] = $url.$fileName;
                    //$requestData['format'] =strtoupper($extension);
                }
            }
            
            $membre = Membre::where('user_id',$uid)->findOrFail($id);
            $membre->update($requestData);

            return redirect('admin/membre')->with('flash_message', 'Mise à jour effectuée avec succès !');
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
        Membre::destroy($id);
        return redirect('admin/membre')->with('flash_message', 'Membre supprimé(e) avec succès !');
        }
        elseif($this->is_Red() || $this->is_Admin()){  
            Membre::where('user_id',$uid)->where('id',$id)->delete();

        return redirect('admin/membre')->with('flash_message', 'Membre supprimé(e) avec succès !');
        }else{
             return "Opération non autorisée !";
        }
    }
}
