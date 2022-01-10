<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Mail\SwandikaEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        Mail::to("swandikatio97@gmail.com")->send(new SwandikaEmail());
 
		return "Email telah dikirim";
    }
}