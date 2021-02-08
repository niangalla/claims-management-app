<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{

    protected $fillable = ['object', 'filiere', 'matiere', 'prof', 'comments', 'inscrit_id'];
    protected $dates = ['created_at', 'updated_at'];

    public function  inscrit() {
        return $this->belongsTo(Inscrit::class);
    }
}
