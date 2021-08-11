<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maladie extends Model
{
    use HasFactory;
    protected $fillable = ['Id_maladie' , 'Nom_maladie' , 'Description_maladie'];
}
