<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CompaniesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companies =  DB::table('companies')
                    ->paginate(5);
    
        return view('companies', compact('companies'));
    }
    
}
