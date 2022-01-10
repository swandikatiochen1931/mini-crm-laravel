<?php

namespace App\Http\Controllers;

use App\Models\Companies;
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
        $companies = DB::table('companies')
            ->paginate(5);

        return view('companies', compact('companies'));
    }

    public function edit($company)
    {
        $companies = DB::table('companies')
            ->paginate(5);

        $company = Companies::find($company);

        return view('companies', compact('company', 'companies'));
    }

    public function store(Request $request)
    {
        $company = new Companies;

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $path = public_path() . '/images/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);

            $company->logo = $path . $filename;
        }
        $company->save();

        // Kirim email
        $mail = new MailController;
        $mail->index($company->id);

        return back();
    }

    public function update(Request $request, $id)
    {
        $company = Companies::find($id);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $path = public_path() . '/images/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);

            $company->logo = $path . $filename;
        }
        $company->save();

        return back();
    }

    public function destroy($id)
    {
        $company = Companies::find($id);

        $company->delete();

        return back();
    }
}
