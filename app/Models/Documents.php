<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table = "enseignants_documents";

    protected $fillable = [
        'id_enseignant',
        'nom_document',
        'document',
        'statut',
    ];
}
