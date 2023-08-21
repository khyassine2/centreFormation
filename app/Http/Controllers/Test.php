<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Facture;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Test extends Controller
{
    public function index()
    {
        // $ta = [];
        // $prof = Formation::all('prof');
        // foreach ($prof as $item ) {
        //     $ta[]= $item->prof;
        // }
        return view('test');
        // if (in_array('4',$prof)) {
        //     // return view('admin.users.show',['user'=>User::find('4'),'froms'=>DB::table('formations')->where('prof','4')]);
        //     // dd('kayen');
        // }else{
        //     return view('admin.users.show',['user'=>User::find('4')]);
        // }
    }
}
