<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
  protected $table = "companies";
  protected $primaryKey = "id";
  protected $fillable = [
    'id', 'name', 'email', 'logo', 'website'
  ];
}
