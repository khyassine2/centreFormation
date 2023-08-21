<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index()
    {
        return view('index',['formations'=>DB::table('formations')->limit(4)->get(),'cat'=>DB::table('categories')->get()]);
    }
    public function meet()
    {
        return view('meetings',['formations'=>Formation::all(),'cat'=>Categorie::all('titre')]);
    }

    public function detaill(Request $request)
    {
        # code...
    }
    public function meetD()
    {
        # code...
    }
}
