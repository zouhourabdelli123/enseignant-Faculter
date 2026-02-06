<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Demandes;

class DemandesController extends Controller
{
    public function affichePage()
    {
        $demandes = Demandes::where("id_enseignant", auth()->user()->id_enseignant)
            ->orderBy("created_at", "desc")
            ->get();

        return view('demande.listeDemande', compact('demandes'));
    }

    public function pageAjoutDemande()
    {
        return view('demande.ajoutDemande');
    }

    public function ajoutDemande(Request $request)
    {

        //svg document dans dossier files in partie admin

        $file = null;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('files'), $fileName);
        }
        Demandes::create([
            "titre" => $request->titre,
            "message" => $request->contenue,
            "id_enseignant" => auth()->user()->id_enseignant,
            "document" =>  $file,
        ]);

        return redirect()->route('afficher_liste_demandes')->with('ajout', 1);
    }
}
