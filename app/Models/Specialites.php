<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialites extends Model
{
    protected $fillable = [
        'specialite_en_francais',
        'specialite_en_arabe',
        'abreviation',
        'id_diplome',
        'archive',
        'archive_diplome',
    ];
}
