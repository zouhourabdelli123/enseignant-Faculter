<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index()
    {
        return view('admin.absences');
    }
    public function affichage()
    {
        return view('admin.index');
    }
    public function demande()
    {
        return view('admin.demande');
    }
    public function suivi_demande()
    {
        return view('admin.suivi_demande');
    }
    public function notes()
    {
        return view('admin.notes');
    }
    public function index_notes()
    {
        return view('admin.notes_index');
    }

    public function message()
    {
        return view('admin.message');
    }

    public function documents()
    {
        return view('admin.documents');
    }

    public function add_document()
    {
        return view('admin.add_document');
    }

    public function historique_presences()
    {
        return view('admin.historique_presences');
    }

    public function afficher_presences_etudiants($id)
    {
        // TODO: Récupérer les données réelles depuis la base de données
        return view('admin.afficher_presences_etudiants', compact('id'));
    }
}
