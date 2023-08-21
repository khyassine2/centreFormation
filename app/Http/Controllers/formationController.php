<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class formationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','meet');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index',['formations'=>DB::table('formations')->limit(4)->get(),'cat'=>Categorie::all()]);
    }
    public function form()
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.formations.index',['formations'=>Formation::all()]);
        }else{
            return redirect()->route('formations.index');
        }
    }
    public function meet()
    {
        return view('meetings',['formations'=>Formation::all(),'cat'=>Categorie::all('titre')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.formations.create',['cats'=>Categorie::all(),'profs'=>DB::table('users')->where('role','prof')->get()]);
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $request->validate([
                'title'=>'required',
                'prix'=>'required',
                'bancs'=>'required',
                'dateD'=>'required',
                'dateF'=>'required',
                'image'=>'required',
                'idCat'=>'required',
                'prof'=>'required',
                'description'=>'required'
            ]);
            if ($request->hasFile('image')&&$request->file('image')->isValid()) {
                $form = new Formation();
                $form->title = $request->title;
                $form->prix = $request->prix;
                $form->bancs = $request->bancs;
                $form->dateD = $request->dateD;
                $form->dateF = $request->dateF;
                $form->image = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public/images',$request->file('image')->getClientOriginalName());
                $form->idCat = $request->idCat;
                $form->prof_id = $request->prof;
                $form->description = $request->description;
                $form->save();
                return redirect()->route('les_formations');
            }else {
                dd(' file is invalid !');
            }
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('meeting-details',['form'=>DB::table('formations')->where('id',$id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.formations.edit',['cats'=>Categorie::all(),'profs'=>DB::table('users')->where('role','prof')->get(),'form'=>Formation::find($id)]);
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Gate::allows('isAdmin')) {
            $request->validate([
                'title'=>'required',
                'prix'=>'required',
                'bancs'=>'required',
                'dateD'=>'required',
                'dateF'=>'required',
                'image'=>'required',
                'idCat'=>'required',
                'prof'=>'required',
                'description'=>'required'
            ]);
            if ($request->hasFile('image')&&$request->file('image')->isValid()) {
                $form =  Formation::find($id);
                $form->title = $request->title;
                $form->prix = $request->prix;
                $form->bancs = $request->bancs;
                $form->dateD = $request->dateD;
                $form->dateF = $request->dateF;
                $form->image = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public/images',$request->file('image')->getClientOriginalName());
                $form->idCat = $request->idCat;
                $form->prof_id = $request->prof;
                $form->description = $request->description;
                $form->save();
                return redirect()->route('les_formations');
            }else {
                dd(' file is invalid !');
            }
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Gate::allows('isSupAdmin')) {
            DB::table('formations')->where("id",$id)->delete();
            return redirect()->route('les_formations');
        } else {
            dd('You are not Admin');
        }
        return redirect()->route('formations.index');
    }
}
