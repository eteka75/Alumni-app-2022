<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests;

use App\Models\Message;
use Illuminate\Http\Request;
use Auth;

class MessageController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        View::share('page', 'message');
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
        $message=[];
        if (!empty($keyword)) {
             if (Auth::user()->hasRole('SuperU')) {
                $message = Message::where('site', 'LIKE', "%$keyword%")
                ->orWhere('objet', 'LIKE', "%$keyword%")
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->orWhere('contact', 'LIKE', "%$keyword%")
                ->orWhere('message', 'LIKE', "%$keyword%")
                ->orWhere('autres', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
                  }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                 $message = Message::where('site', 'LIKE', "%$keyword%")
                ->orWhere('objet', 'LIKE', "%$keyword%")
                ->orWhere('nom', 'LIKE', "%$keyword%")
                ->orWhere('contact', 'LIKE', "%$keyword%")
                ->orWhere('message', 'LIKE', "%$keyword%")
                ->orWhere('autres', 'LIKE', "%$keyword%")
                ->orderBy("id",$order)->paginate($perPage);
            } 
        } else {
             if (Auth::user()->hasRole('SuperU')) {
                $message = Message::orderBy("id",$order)->paginate($perPage);
               }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                $message = Message::orderBy("id",$order)->paginate($perPage); 
            }
        }

        return view('admin.message.index', compact('message','nb','order','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if($this->is_Admin() || $this->is_Red() || $this->is_SuperU()){  
        return view('admin.message.create');
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
			'objet' => 'required',
			'nom' => 'required',
			'message' => 'required'
		]);
        $requestData = $request->all();
        $uid = $request->user()->id;
        $requestData[ 'user_id']=$uid;
        
        Message::create($requestData);

        return redirect('admin/message')->with('flash_message', 'Message ajouté(e) avec succès !');
       
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
            $message = Message::findOrFail($id);

            return view('admin.message.show', compact('message'));
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
            $message = Message::findOrFail($id);
            return view('admin.message.edit', compact('message'));
         }
         elseif($this->is_Red() || $this->is_Admin()){
            $uid = Auth::user()->id;
            $message = Message::where('user_id',$uid)->findOrFail($id);
            return view('admin.message.edit', compact('message'));
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
			'objet' => 'required',
			'nom' => 'required',
			'message' => 'required'
		]);
            $requestData = $request->all();
            
            $message = Message::findOrFail($id);
            $message->update($requestData);

            return redirect('admin/message')->with('flash_message', 'Mise à jour effectuée avec succès !');
         }
         elseif($this->is_Red() || $this->is_Admin()){   
            $uid = $request->user()->id;           
            $this->validate($request, [
			'site' => 'required',
			'objet' => 'required',
			'nom' => 'required',
			'message' => 'required'
		]);
            $requestData = $request->all();
            
            $message = Message::where('user_id',$uid)->findOrFail($id);
            $message->update($requestData);

            return redirect('admin/message')->with('flash_message', 'Mise à jour effectuée avec succès !');
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
        Message::destroy($id);
        return redirect('admin/message')->with('flash_message', 'Message supprimé(e) avec succès !');
        }
        elseif($this->is_Red() || $this->is_Admin()){  
            Message::where('user_id',$uid)->where('id',$id)->delete();

        return redirect('admin/message')->with('flash_message', 'Message supprimé(e) avec succès !');
        }else{
             return "Opération non autorisée !";
        }
    }
}
