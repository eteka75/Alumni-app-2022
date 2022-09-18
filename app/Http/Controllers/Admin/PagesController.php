<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Page;
use Illuminate\Http\Request;
use Str;
use Auth;

class PagesController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        View::share('page', 'page');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function is_Admin(){
        return (Auth::check() &&  Auth::user()->hasRole('Admin'));
    }
    public function is_Red(){
        return (Auth::check() &&  Auth::user()->hasRole('Redacteur'));
    }
    public function is_SuperU(){
        return (Auth::check() &&  Auth::user()->hasRole('SuperU'));
    }
    public function index(Request $request)
    {
        
        $keyword = $request->get('search');
        $perPage =  strtoupper($request->input('nb'));
        $order =  strtoupper($request->input('order'));
        $search =  $request->input('search');
        $tab=[5,10,20,30];
        $orders=["ASC","DESC"];
        $nb=$perPage=in_array($perPage,$tab)? $perPage:5;
        $order=in_array( $order,$orders)? $order:"DESC";
        $o=$request->input('order');
        //dd(Auth::user()->name);
        //dd(Auth::user()->roles->first()->name);
        /*if (Auth::check() && Auth::user()->hasRole('Admin')) {
            // Do admin stuff here
            dd("Super Admin");
        } 
        if (Auth::check() && Auth::user()->hasRole('Redacteur')) {
            // Do admin stuff here
            dd("Redacteur");
        } 
        if (Auth::check() && Auth::user()->hasRole('SuperU')) {
            // Do admin stuff here
            dd("Super U");
        } 
        if (Auth::check() && Auth::user()->hasRole('Redacteur')) {
            // Do admin stuff here
            dd("Redacteur");
        } */
        
        $uid = $request->user()->id;
        
        if (!empty($keyword)) {
            
            if (Auth::user()->hasRole('SuperU')) {
                $pages = Page::where('title', 'LIKE', "%$keyword%")
                    ->orWhere('content', 'LIKE', "%$keyword%")
                    ->orderBy("id",$order)->paginate($perPage);
                }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                $pages = Page::where('user_id',$uid)
                ->where('title', 'LIKE', "%$keyword%")
                    ->orWhere('content', 'LIKE', "%$keyword%")
                    ->orderBy("id",$order)->paginate($perPage);
            }
           

        } else {
            if (Auth::user()->hasRole('SuperU')) {
            $pages = Page::orderBy("id",$order)->paginate($perPage);
            }
            elseif(Auth::check() && (Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Redacteur'))){
                $pages = Page::where('user_id',$uid)->orderBy("id",$order)->paginate($perPage);
            }
        }

        return view('admin.pages.index', compact('pages','nb','order','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.create');
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'image'
        ]);
        $uid = Auth::user()->id;
        $requestData = $request->all();
        $title = $request->input("title");
        $requestData['user_id']=$uid;
        $requestData['etat']=0;
        $requestData['slug']=substr(Str::slug($title,"—"),0,150);    
        
        $url='storage/uploads/pages/';
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
        
        Page::create($requestData);

        return redirect('admin/pages')->with('flash_message', 'Page ajouté(e) avec succès !');
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
        $page = Page::findOrFail($id);

        return view('admin.pages.show', compact('page'));
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
        $page = Page::findOrFail($id);

        return view('admin.pages.edit', compact('page'));
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
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'image' => 'image',
            'content' => 'required'
        ]);
        $requestData = $request->all();
        
        $url='storage/uploads/pages/';
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
        $page = Page::findOrFail($id);
        $page->update($requestData);

        return redirect('admin/pages')->with('flash_message', 'Mise à jour effectuée avec succès !');
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
        Page::destroy($id);

        return redirect('admin/pages')->with('flash_message', 'Page supprimée avec succès !');
    }
}
