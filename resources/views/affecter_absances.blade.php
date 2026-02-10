@extends('dashbaord.main')

@section('content')
<div class="page-container">
    <!-- HEADER -->
    <div class="header-section">
        <div class="header-text">
            <h2 class="page-title">Feuille de Présence</h2>
            <p class="page-subtitle">Gérez les présences de votre classe pour cette séance</p>
        </div>
        <div class="validation-area">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-check"></i> Valider la présence
            </button>
        </div>
    </div>

    <!-- SESSION INFO -->
    <div class="session-info-card">
        <div class="session-row">
            <div class="session-main">
                <div class="session-icon-wrapper">
                    <div class="session-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                            <path d="M6 12v5c3 3 9 3 12 0v-5" />
                        </svg>
                    </div>
                </div>
                <div class="session-content">
                    <div class="session-top-badges">
                        <span class="session-type-badge">{{ $type_cours }}</span>
                        <span class="session-group-badge">Groupe {{ $groupe }}</span>
                    </div>
                    <h3 class="session-title">{{ $nom_specialite }}</h3>
                    <p class="session-subtitle">{{ $nom_matiere }}</p>
                </div>
            </div>

            <div class="session-details-grid">
                <div class="detail-item">
                    <span class="detail-icon"><i class="fas fa-layer-group"></i></span>
                    <div class="detail-text">
                        <span class="detail-label">Niveau</span>
                        <span class="detail-value">{{ $nom_niveau }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <span class="detail-icon"><i class="fas fa-calendar-alt"></i></span>
                    <div class="detail-text">
                        <span class="detail-label">Semestre</span>
                        <span class="detail-value">{{ $semester }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <span class="detail-icon"><i class="fas fa-clock"></i></span>
                    <div class="detail-text">
                        <span class="detail-label">Horaire</span>
                        <span class="detail-value">{{ $date_debut }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <span class="detail-icon"><i class="fas fa-map-marker-alt"></i></span>
                    <div class="detail-text">
                        <span class="detail-label">Type Séance</span>
                        <span class="detail-value">{{ $type_seance }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form method="post" action="{{ route('valisez_presences') }}" id='sessionForm'>
        @csrf
        <!-- DATATABLE -->
        <div class="table-card attendance-card">
            <div class="table-card-header">
                <h3 class="table-title">Liste de Présence</h3>
            </div>

            <table id="suiviTable" class="attendance-table" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Présent</th>
                        <th>Historiques</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etudiants as $etudiant)
                    <tr>
                        <td><span class="code-badge">{{ $etudiant->code_etudiant }}</span></td>
                        <td><span class="student-name">{{ $etudiant->etudiant->prenom }}</span></td>
                        <td><span class="student-name">{{ $etudiant->etudiant->nom }}</span></td>
                        <td>
                            <input type="checkbox" class="presence-checkbox" name="presances[]" value="{{ $etudiant->code_etudiant }}"
                                {{ $etudiant->est_present == 1 ? 'checked' : '' }}>
                        </td>
                        <td>
                            @php
                            $presance = $historiqueAbsances
                            ->where('code_etudiant', $etudiant->code_etudiant)
                            ->first();
                            @endphp
                            <div class="history-stack">
                                <span class="history-item">
                                    {{ $presance->presences ?? 0 }} présences
                                </span>
                                <span class="history-item warning">
                                    {{ $presance->absences_non_justifier ?? 0 }} absences non justifiées
                                </span>
                                <span class="history-item danger">
                                    {{ $presance->absences_justifier ?? 0 }} absences justifiées
                                </span>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
    </form>
</div>

<link rel="stylesheet" href="{{ asset('css/custom_datatables.css') }}">
<link rel="stylesheet" href="{{ asset('css/affecter_absances.css') }}">

<script src="{{ asset('js/custom_datatables.js') }}"></script>
<script src="{{ asset('js/script_affecter_absances.js') }}"></script>
<input id="validez" hidden value="{{ $validez }}">

@endsection