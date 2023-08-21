<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\use_form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class useFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('formations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.useForm.create',['users'=>DB::table('users')->where('role','user')->get(),'forms'=>Formation::all()]);
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::allows('isAdmin')||Gate::allows('isUser')) {
            $request->validate([
                'form'=>'required',
                'user_id'=>'required',
            ]);
            try {
                $ex = new use_form();
                $ex->user_id = $request->user_id;
                $ex->idForm = $request->form;
                $ex->date = date("Y/m/d");
                $ex->save();
                return redirect()->route('catigorie.show',$request->form);
            } catch (\Throwable $th) {
                return view('errors.duplicate');
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
        if (Gate::allows('isAdmin')) {

            return view('admin.useForm.create',['user'=>User::find($id),'forms'=>Formation::all()]);
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('formations.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('formations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('formations.index');
    }
}
