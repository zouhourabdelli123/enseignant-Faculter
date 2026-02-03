<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matieres extends Model
{
    protected $fillable = [
        'nom',
        'regime',
        'coefficient',
        'credit',
        'horaire_cours',
        'horaire_td',
        'horaire_tp',
        'semestre',
        'coefficient_orale',
        'coefficient_tp',
        'coefficient_ds',
        'coefficient_examen',
        'coefficient_projet',
        'coefficient_test',
        'id_module',
    ];
}
