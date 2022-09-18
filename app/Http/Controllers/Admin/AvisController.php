<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Avi;
use Illuminate\Http\Request;
use Auth;

class AvisController extends Controller
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
                $avis = Avi::where('user_id',$uid)
                ->where('nom_prenom', 'LIKE', "%$keyword%")
                ->orWhere('fonction', 'LIKE', "%$keyword%")
                ->orWhere('avis', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
                  }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                 $avis = Avi::where('nom_prenom', 'LIKE', "%$keyword%")
                ->orWhere('fonction', 'LIKE', "%$keyword%")
                ->orWhere('avis', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
            } 
        } else {
             if (Auth::user()->hasRole('SuperU')) {
                $avis = Avi::orderBy("id",$order)->paginate($perPage);
               }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                $avis = Avi::where('user_id',$uid)
                ->orderBy("id",$order)->paginate($perPage); 
            }
        }
        return view('admin.avis.index', compact('avis','nb','order','search'));
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
        return view('admin.avis.create');
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
			'nom_prenom' => 'required',
			'fonction' => 'required',
			'avis' => 'required',
			'photo' => 'image',
			'etat' => 'required'
		]);

        $url='storage/uploads/avis/';
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
        
        Avi::create($requestData);

        return redirect('admin/avis')->with('flash_message', 'Avi ajouté(e) avec succès !');
       
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
            $avi = Avi::findOrFail($id);

            return view('admin.avis.show', compact('avi'));
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
            $avi = Avi::findOrFail($id);
            return view('admin.avis.edit', compact('avi'));
         }
         elseif($this->is_Red() || $this->is_Admin()){
            $uid = Auth::user()->id;
            $avi = Avi::where('user_id',$uid)->findOrFail($id);
            return view('admin.avis.edit', compact('avi'));
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
			'nom_prenom' => 'required',
			'fonction' => 'required',
			'avis' => 'required',
			'photo' => 'required',
			'etat' => 'required'
		]);
            $requestData = $request->all();
            $url='storage/uploads/avis/';
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
            $avi = Avi::findOrFail($id);
            $avi->update($requestData);

            return redirect('admin/avis')->with('flash_message', 'Mise à jour effectuée avec succès !');
         }
         elseif($this->is_Red() || $this->is_Admin()){   
            $uid = $request->user()->id;           
            $this->validate($request, [
			'nom_prenom' => 'required',
			'fonction' => 'required',
			'avis' => 'required',
			'photo' => 'required',
			'etat' => 'required'
		]);
            $requestData = $request->all();
            $url='storage/uploads/avis/';
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
            $avi = Avi::where('user_id',$uid)->findOrFail($id);
            $avi->update($requestData);

            return redirect('admin/avis')->with('flash_message', 'Mise à jour effectuée avec succès !');
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
        Avi::destroy($id);
        return redirect('admin/avis')->with('flash_message', 'Avi supprimé(e) avec succès !');
        }
        elseif($this->is_Red() || $this->is_Admin()){  
            Avi::where('user_id',$uid)->where('id',$id)->delete();

        return redirect('admin/avis')->with('flash_message', 'Avi supprimé(e) avec succès !');
        }else{
             return "Opération non autorisée !";
        }
    }
}
