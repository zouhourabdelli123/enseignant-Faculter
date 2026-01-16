@extends('dashbaord.main')

@section('content')
<link href="{{ asset('css/common_datatables.css') }}" rel="stylesheet">

<div class="page-container">
    <!-- HEADER -->
    <div class="header-section">
        <div class="header-text">
            <h2 class="page-title">Liste des documents</h2>
            <p class="page-subtitle">Gérez vos documents administratifs et académiques</p>
        </div>
        <a href="{{ route('documents.add') }}" class="btn btn-primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 5v14M5 12h14" />
            </svg>
            Ajouter
        </a>
    </div>
    <div class="table-card">
        <table id="documentsTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>STATUT</th>
                    <th>ÉTABLISSEMENT</th>
                    <th>GRADE</th>
                    <th>DOCUMENT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <!-- Données de démo -->
                <tr>
                    <td>2026-11-14 15:53:18</td>
                    <td>CV</td>
                    <td>Universitaire</td>
                    <td>IIT</td>
                    <td>chadi8iik</td>
                    <td>
                        <button class="btn-outline" style="margin-right: 0.5rem; border-color: #10b981; color: #10b981;"
                            onclick="editDocument(1, this)">
                            <i class="fas fa-edit"></i>
                            Modifier
                        </button>
                        <button class="btn btn-primary" onclick="downloadDocument(1)">
                            <i class="fas fa-download"></i>
                            Télécharger
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>2026-10-20 10:15:42</td>
                    <td>Diplôme</td>
                    <td>Universitaire</td>
                    <td>Licence</td>
                    <td>diplome_licence.pdf</td>
                    <td>
                        <button class="btn-outline" style="margin-right: 0.5rem; border-color: #10b981; color: #10b981;"
                            onclick="editDocument(2, this)">
                            <i class="fas fa-edit"></i>
                            Modifier
                        </button>
                        <button class="btn btn-primary" onclick="downloadDocument(2)">
                            <i class="fas fa-download"></i>
                            Télécharger
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>2026-09-05 14:22:10</td>
                    <td>Attestation</td>
                    <td>Professionnel</td>
                    <td>Master</td>
                    <td>attestation_travail.pdf</td>
                    <td>
                        <button class="btn-outline" style="margin-right: 0.5rem; border-color: #10b981; color: #10b981;"
                            onclick="editDocument(3, this)">
                            <i class="fas fa-edit"></i>
                            Modifier
                        </button>
                        <button class="btn btn-primary" onclick="downloadDocument(3)">
                            <i class="fas fa-download"></i>
                            Télécharger
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div id="editDocumentModal" class="modal-overlay" onclick="closeModalOnOutside(event, 'editDocumentModal')">
    <div class="modal-box" onclick="event.stopPropagation()">
        <button class="modal-close" onclick="closeEditDocumentModal()">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round">
                <path d="M18 6L6 18M6 6l12 12" />
            </svg>
        </button>

        <div class="modal-header">
            <div class="modal-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 20h9" />
                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z" />
                </svg>
            </div>
            <h3 class="modal-title">Modifier le document</h3>
            <p class="modal-subtitle">Mettez a jour les informations du document</p>
        </div>

        <form id="editDocumentForm" class="modal-form">
            <input type="hidden" id="editDocumentId">
            <div class="form-group">
                <label class="form-label" for="editStatutInput">Statut</label>
                <select id="editStatutInput" class="form-select" required>
                    <option value="">Selectionner un type</option>
                    <option value="CV">CV</option>
                    <option value="Diplome">Diplome</option>
                    <option value="Attestation">Attestation</option>
                    <option value="Certificat">Certificat</option>
                    <option value="Releve de notes">Releve de notes</option>
                    <option value="Lettre de motivation">Lettre de motivation</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="editEtablissementInput">Etablissement</label>
                <input type="text" id="editEtablissementInput" class="form-input" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="editGradeInput">Grade</label>
                <input type="text" id="editGradeInput" class="form-input" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="editDocumentNameInput">Document</label>
                <input type="text" id="editDocumentNameInput" class="form-input" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="editDocumentFileInput">Nouveau fichier (optionnel)</label>
                <input type="file" id="editDocumentFileInput" class="form-input"
                    accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
            </div>
        </form>

        <div class="modal-actions">
            <button type="button" class="btn btn-secondary" onclick="closeEditDocumentModal()">Annuler</button>
            <button type="submit" form="editDocumentForm" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
</div>



<script src="{{ asset('js/documents.js') }}"></script>

@endsection
