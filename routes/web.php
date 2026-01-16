<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbsenceController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/absences', [AbsenceController::class, 'index'])->name('absences.index');
    Route::get('/affichage', [AbsenceController::class, 'affichage'])->name('affichage.index');
    Route::get('/demande', [AbsenceController::class, 'demande'])->name('demande.index');
    Route::get('/suivi_demande', [AbsenceController::class, 'suivi_demande'])->name('suivi_demande.index');
    Route::get('/notes', [AbsenceController::class, 'notes'])->name('notes.index');
    Route::get('/index_notes', [AbsenceController::class, 'index_notes'])->name('index_notes.index');
    Route::get('/message', [AbsenceController::class, 'message'])->name('message.index');
    Route::get('/documents', [AbsenceController::class, 'documents'])->name('documents.index');
    Route::get('/documents/add', [AbsenceController::class, 'add_document'])->name('documents.add');
    Route::get('/historique-presences', [AbsenceController::class, 'historique_presences'])->name('historique_presences.index');
    Route::get('/afficher-presences-etudiants/{id}', [AbsenceController::class, 'afficher_presences_etudiants'])->name('afficher_presences_etudiants');

});
require __DIR__ . '/auth.php';
