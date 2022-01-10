<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Mail\SwandikaEmail;
use App\Models\Companies;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($company_id)
    {
        $company = Companies::find($company_id);

        $details = [
            'title' => 'Company Registered',
            'body' => '1 Company has been registered: ' . $company->name
        ];

        \Mail::to('example@gmail.com')->send(new \App\Mail\SwandikaEmail($details));

        // Mail::to("swandikatio97@gmail.com")->send(new SwandikaEmail());

        return "Email telah dikirim";
    }
}
