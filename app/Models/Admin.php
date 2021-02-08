<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // use HasFactory;
    protected $fillable = ['identifiant_admin', 'password_admin', 'admin_name', 'admin_poste', 'admin_adress', 'admin_mail'];
}
