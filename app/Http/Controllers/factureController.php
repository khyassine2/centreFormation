<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Formation;
use App\Models\use_form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class factureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.facture.index',['factures'=>Facture::all()]);
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            $request->validate([
                'prix'=>'required',
                'code'=>'required',
            ]);
            $facture = new Facture();
            $facture->idUsForm = $request->code;
            $facture->prix = $request->prix;
            $facture->date = date("Y-m-d");
            $facture->save();
            return redirect()->route('etudiant.index');
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.facture.create',['useForm'=>use_form::find($id)]);
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
