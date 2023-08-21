<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CatigorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.catigorie.index',['cats'=>Categorie::all()]);
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.catigorie.create');
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
                'titre'=>'required',
                'description'=>'required',
            ]);
            $cat = new Categorie();
            $cat->titre = $request->titre;
            $cat->description = $request->description;
            $cat->save();
            return redirect()->route('catigorie.index');
        }else{
            return redirect()->route('formations.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        return view('payment',['x'=>DB::table('formations')->where('id',$id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.catigorie.edite',['cat'=>Categorie::find($id)]);
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
                'titre'=>'required',
                'description'=>'required',
            ]);
            $cat = Categorie::find($id);
            $cat->titre = $request->titre;
            $cat->description = $request->description;
            $cat->save();
            return redirect()->route('catigorie.index');
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Gate::allows('isAdmin')) {
            DB::table('categories')->where('id',$id)->delete();
            return redirect()->route('catigorie.index');
        }else{
            return redirect()->route('formations.index');
        }
    }
}
