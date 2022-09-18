<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Activite;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Str;
use Auth;

class ActiviteController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        View::share('page', 'activite');
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
        $order=in_array( $order,$orders)? $order:"DESC";
        $o=$request->input('order');
        $uid = $request->user()->id;

        if (!empty($keyword)) {
             if (Auth::user()->hasRole('SuperU')) {
                $activite = Activite::where('user_id',$uid)
                ->where('site', 'LIKE', "%$keyword%")
                ->orWhere('titre', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('resume', 'LIKE', "%$keyword%")
                ->orWhere('contenu', 'LIKE', "%$keyword%")
                ->orWhere('view_count', 'LIKE', "%$keyword%")
                ->orWhere('categorie_id', 'LIKE', "%$keyword%")
                ->orWhere('actif', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
                  }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                 $activite = Activite::where('site', 'LIKE', "%$keyword%")
                ->orWhere('titre', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('resume', 'LIKE', "%$keyword%")
                ->orWhere('contenu', 'LIKE', "%$keyword%")
                ->orWhere('view_count', 'LIKE', "%$keyword%")
                ->orWhere('categorie_id', 'LIKE', "%$keyword%")
                ->orWhere('actif', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
            } 
        } else {
             if (Auth::user()->hasRole('SuperU')) {
                $activite = Activite::orderBy("id",$order)->paginate($perPage);
               }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                $activite = Activite::where('user_id',$uid)
                ->orderBy("id",$order)->paginate($perPage); 
            }
        }
        return view('admin.activite.index', compact('activite','nb','order','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->userCheck();
        $categories=Categorie::orderBy('nom')->get()->pluck('nom', 'id');
        //dd($categories);
        if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){  
            return view('admin.activite.create',compact('categories'));
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
			'site' => ['required','in:COTONOU,PARAKOU'],
			'titre' => ['required','max:250'],
			'resume' => ['required','max:550'],
			'contenu' => ['required','max:1000000'],
			'categorie_id' =>['required','integer'],            
            'image' => ['image','mimes:jpg,jpeg,png,webp'],
			'etat' => ['required','in:1,0']
		]);
        $requestData = $request->all();
        $title = $request->input('titre', mt_rand(11111,99999999999));
        $uid = $request->user()->id;
        $requestData[ 'user_id']=$uid;
        $requestData[ 'slug']=substr(Str::slug($title),0,150);
        $url='storage/uploads/activites/';
        if ($request->hasFile('image')) {
            if($file=$request['image'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_page.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['image'] = $url.$fileName;
                //$requestData['format'] =strtoupper($extension);
            }
        }
        Activite::create($requestData);

        return redirect('admin/activite')->with('flash_message', 'Activité ajouté(e) avec succès !');
       
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
            $activite = Activite::findOrFail($id);

            return view('admin.activite.show', compact('activite'));
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
        $categories=Categorie::orderBy('nom')->get()->pluck('nom', 'id');
        
        if($this->is_SuperU() ){ 
            $activite = Activite::findOrFail($id);
            return view('admin.activite.edit', compact('activite','categories'));
         }
         elseif($this->is_Red() || $this->is_Admin()){
            $uid = Auth::user()->id;
            $activite = Activite::where('user_id',$uid)->findOrFail($id);
            return view('admin.activite.edit', compact('activite','categories'));
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
        $this->validate($request, [
			'site' => ['required','in:COTONOU,PARAKOU'],
			'titre' => ['required','max:250'],
			'resume' => ['required','max:550'],
			'contenu' => ['required','max:1000000'],
            'image' => ['image','mimes:jpg,jpeg,png,webp'],
			'categorie_id' =>['required','integer'],
			'etat' => ['required','in:1,0']
		]);
         if($this->is_SuperU() ){           
           
            $requestData = $request->all();
            $url='storage/uploads/activites/';
            if ($request->hasFile('image')) {
                if($file=$request['image'] ){
                    $uploadPath = ($url);

                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(11111, 99999) . '_page.' . $extension;

                    $file->move($uploadPath, $fileName);
                    $requestData['image'] = $url.$fileName;
                    //$requestData['format'] =strtoupper($extension);
                }
            }
            $activite = Activite::findOrFail($id);
            $activite->update($requestData);

            return redirect('admin/activite')->with('flash_message', 'Mise à jour effectuée avec succès !');
         }
         elseif($this->is_Red() || $this->is_Admin()){   
           
            $requestData = $request->all();
            $url='storage/uploads/activites/';
            if ($request->hasFile('image')) {
                if($file=$request['image'] ){
                    $uploadPath = ($url);

                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(11111, 99999) . '_page.' . $extension;

                    $file->move($uploadPath, $fileName);
                    $requestData['image'] = $url.$fileName;
                    //$requestData['format'] =strtoupper($extension);
                }
            }
            $activite = Activite::where('user_id',$uid)->findOrFail($id);
            $activite->update($requestData);

            return redirect('admin/activite')->with('flash_message', 'Mise à jour effectuée avec succès !');
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
        Activite::destroy($id);
        return redirect('admin/activite')->with('flash_message', 'Activite supprimé(e) avec succès !');
        }
        elseif($this->is_Red() || $this->is_Admin()){  
            Activite::where('user_id',$uid)->where('id',$id)->delete();

        return redirect('admin/activite')->with('flash_message', 'Activite supprimé(e) avec succès !');
        }else{
             return "Opération non autorisée !";
        }
    }
}
