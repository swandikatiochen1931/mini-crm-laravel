<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table ="employees";
    protected $primaryKey ="id";
    protected $fillable = [
      'id','first name','last name','company','email','phone'];
}

