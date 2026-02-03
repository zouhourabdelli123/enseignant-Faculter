<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enseignements extends Model
{
    protected $table = "enseignants_enseignements";

    protected $fillable = [
        'date',
        'annee',
        'groupe',
        'semestre',
        'id_enseignant',
        'id_specialite',
        'id_niveau',
        'id_matiere',
    ];

    public function specialite()
    {
        return $this->belongsTo(Specialites::class, "id_specialite")
            ->select('id', 'specialite_en_francais');
    }

    public function niveau()
    {
        return $this->belongsTo(Niveaux::class, "id_niveau")
            ->select('id', 'nom');
    }

    public function matiere()
    {
        return $this->belongsTo(Matieres::class, "id_matiere")
            ->select('id', 'nom');
    }
}
