<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


// use HasFactory;

class Inscrit extends Model {

use HasFactory;
    protected $fillable = [
        'identifiant_student',
        'id',
        'prenom',
        'nom',
        'niveau',
        'filiere',
        'password',
        'mail',
        'adresse',
        'sex',
        'ine',
        'dateNaissance',
    ];
    protected $dates = ['dateNaissance'];

    public function reclamations() {
        return $this->hasMany(Reclamation::class);
    }

    public function isMaleOrFemale() {
       return $this->sex == 'F' ? 'F' : 'H';
    }

    //  function credentials() {
    //     return filter_var(request('identifiant_student'), FILTER_VALIDATE_EMAIL) ? 'mail' : 'identifiant_student';
    // }
}

?>
