<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursusEtudiant extends Model
{
    protected $fillable = [
        'code_etudiant',
        'annee',
        'date_inscription',
        'id_specialite',
        'id_niveau',
        'groupe',
        'id_parcours',
        'categorie',
        'retardataire',
        'serie_paiement',
        'code_compbitable',
        'etat',
        'memo',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiants::class, "code_etudiant","code_etudiant")
            ->select('code_etudiant', 'nom', 'prenom');
    }
}
