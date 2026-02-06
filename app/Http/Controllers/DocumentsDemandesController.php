<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Documents;

class DocumentsDemandesController extends Controller
{
    public function affichePagesDemandes()
    {
        $documents = Documents::where('id_enseignant', auth()->user()->id_enseignant)
            ->get();
        return view('documents.listeDocuments', compact('documents'));
    }

    public function ajoutDemandePage()
    {
        return view('documents.pageAjoutDemande');
    }

    public function ajoutDemandeDocument(Request $request)
    {
        //svg document dans dossier files in partie admin

        $file = $request->file('document');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('files'), $fileName);
        Documents::create([
            "nom_document" => $request->nom_document,
            "id_enseignant" => auth()->user()->id_enseignant,
            "document" =>  $fileName,
        ]);

        return redirect()->route('afficher_liste_documents')->with('ajout', 1);
    }

    public function downloadPdf($name)
    {
        $filePath = public_path("files\\" . $name);
        return response()->download($filePath);
    }
}
