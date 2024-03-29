<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests;

use App\Models\Slide;
use Illuminate\Http\Request;
use Auth;
use Str;

class SlideController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        View::share('page', 'slide');
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
                $slide = Slide::where('user_id',$uid)
                ->where('titre', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('sous_titre', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
                  }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                 $slide = Slide::where('titre', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('sous_titre', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
            } 
        } else {
             if (Auth::user()->hasRole('SuperU')) {
                $slide = Slide::orderBy("id",$order)->paginate($perPage);
               }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                $slide = Slide::where('user_id',$uid)
                ->orderBy("id",$order)->paginate($perPage); 
            }
        }
        return view('admin.slide.index', compact('slide','nb','order','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){  
        return view('admin.slide.create');
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
			'sous_titre' => 'required',
			'image' => 'required|image',
			'etat' => 'required'
		]);
        $requestData = $request->all();
        $url='storage/uploads/slides/';
        
        $slug=substr(Str::slug($request->input("title")),0,150);
        if ($request->hasFile('image')) {
            if($file=$request['image'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_slide.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['image'] = $url.$fileName;
                //$requestData['format'] =strtoupper($extension);
            }
        }   
        $uid = $request->user()->id;
        $requestData[ 'user_id']=$uid;
        
        Slide::create($requestData);

        return redirect('admin/slide')->with('flash_message', 'Slide ajouté(e) avec succès !');
       
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
            $slide = Slide::findOrFail($id);

            return view('admin.slide.show', compact('slide'));
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
            $slide = Slide::findOrFail($id);
            return view('admin.slide.edit', compact('slide'));
         }
         elseif($this->is_Red() || $this->is_Admin()){
            $uid = Auth::user()->id;
            $slide = Slide::where('user_id',$uid)->findOrFail($id);
            return view('admin.slide.edit', compact('slide'));
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
			'sous_titre' => 'required',
			'image' => 'image',
			'etat' => 'required'
		]);
        $requestData = $request->all();
        $url='storage/uploads/slides/';
        if ($request->hasFile('image')) {
            if($file=$request['image'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_slide.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['image'] = $url.$fileName;
                //$requestData['format'] =strtoupper($extension);
            }
        }   
            $slide = Slide::findOrFail($id);
            $slide->update($requestData);

            return redirect('admin/slide')->with('flash_message', 'Mise à jour effectuée avec succès !');
         }
         elseif($this->is_Red() || $this->is_Admin()){   
            $uid = $request->user()->id;           
            $this->validate($request, [
			'sous_titre' => 'required',
			'image' => 'required',
			'etat' => 'required'
		]);
            $requestData = $request->all();
            $url='storage/uploads/slides/';
            if ($request->hasFile('image')) {
                if($file=$request['image'] ){
                    $uploadPath = ($url);
    
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(11111, 99999) . '_slide.' . $extension;
    
                    $file->move($uploadPath, $fileName);
                    $requestData['image'] = $url.$fileName;
                    //$requestData['format'] =strtoupper($extension);
                }
            }   
            $slide = Slide::where('user_id',$uid)->findOrFail($id);
            $slide->update($requestData);

            return redirect('admin/slide')->with('flash_message', 'Mise à jour effectuée avec succès !');
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
        Slide::destroy($id);
        return redirect('admin/slide')->with('flash_message', 'Slide supprimé(e) avec succès !');
        }
        elseif($this->is_Red() || $this->is_Admin()){  
            Slide::where('user_id',$uid)->where('id',$id)->delete();

        return redirect('admin/slide')->with('flash_message', 'Slide supprimé(e) avec succès !');
        }else{
             return "Opération non autorisée !";
        }
    }
}
