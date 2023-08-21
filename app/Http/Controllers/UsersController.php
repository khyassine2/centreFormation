<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Formation;
use App\Models\use_form;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (Gate::allows('isAdmin')) {
            if ($request) {
                $role = $request->role;
            }
            $request->role ? $role = $request->role: $role = 'user';
            return view('admin.users.index',['users'=>DB::table('users')->where('role',$role)->get()]);
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
            return view('admin.users.create');
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
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->save();
            return redirect()->route('etudiant.index');
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id,Request $request)
    {
        if (Gate::allows('isAdmin')) {
            // $prof = [Formation::all('prof')];
            // if (in_array($id,$prof)) {
            //     return view('admin.users.show',['user'=>User::find($id),'froms'=>DB::table('formations')->where('prof',$id)]);
            // }else{
                return view('admin.users.show',['user'=>User::find($id)]);
            // }
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Gate::allows('isAdmin')) {
            return view('admin.users.edit',['user'=>User::find($id)]);
        }else{
            return redirect()->route('formations.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request, string $id)
    {
        if (Gate::allows('isAdmin')) {
            $request->user()->fill($request->validated());
            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }
            $request->user()->save();
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }else{
            return redirect()->route('formations.index');
        }
    }

    public function forms()
    {
        if (Gate::allows('isUser')) {
            return view('user.forms',['forms'=>use_form::all()->where('user_id',Auth::user()->id)]);
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
            DB::table('users')->where("id",$id)->delete();
            return redirect()->route('etudiant.index');
        }else{
            return redirect()->route('formations.index');
        }
    }
}
