@extends('dashbaord.main')

@section('content')
    <div class="page-container">
        <!-- HEADER -->
        <div class="header-section">
            <div class="header-text">
                <h2 class="page-title">Feuille de Présence</h2>
                <p class="page-subtitle">Gérez les présences de votre classe</p>
            </div>
        </div>

        <!-- SESSION INFO -->
        <div class="session-info-card">
            <div class="session-header">
                <div class="session-icon-wrapper">
                    <div class="session-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                            <path d="M6 12v5c3 3 9 3 12 0v-5" />
                        </svg>
                    </div>
                </div>
                <div class="session-content">
                    <span class="session-type-badge">{{ $type_cours }}</span>
                    <h3 class="session-title">{{ $nom_specialite }}</h3>
                    <p class="session-subtitle">{{ $nom_matiere }}</p>
                </div>
                <div class="session-badge">G{{ $groupe }}</div>
            </div>

            <div class="session-details-grid">
                <div class="detail-item">
                    <span class="detail-icon"><i class="fas fa-layer-group"></i></span>
                    <div>
                        <span class="detail-label">Niveau</span>
                        <span class="detail-value">{{ $nom_niveau }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <span class="detail-icon"><i class="fas fa-calendar-alt"></i></span>
                    <div>
                        <span class="detail-label">Semestre</span>
                        <span class="detail-value">{{ $semester }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <span class="detail-icon"><i class="fas fa-clock"></i></span>
                    <div>
                        <span class="detail-label">Horaire</span>
                        <span class="detail-value">{{ $date_debut }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <span class="detail-icon"><i class="fas fa-map-marker-alt"></i></span>
                    <div>
                        <span class="detail-label">Type Séance</span>
                        <span class="detail-value">{{ $type_seance }}</span>
                    </div>
                </div>
            </div>
        </div>


        <form method="post" action="{{ route('valisez_presences') }}" id='sessionForm'>
            @csrf
            <!-- DATATABLE -->
            <div class="table-card">
                <div class="table-card-header">
                    <h3 class="table-title">Liste de Présence</h3>
                </div>

                <table id="suiviTable" class="display" style="width:100%">
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
                                <td>{{ $etudiant->code_etudiant }}</td>
                                <td>{{ $etudiant->etudiant->prenom }}</td>
                                <td>{{ $etudiant->etudiant->nom }}</td>
                                <td>
                                    <input type="checkbox" name="presances[]" value="{{ $etudiant->code_etudiant }}"
                                        {{ $etudiant->est_present == 1 ? 'checked' : '' }}>
                                </td>
                                <td>
                                    @php
                                        $presance = $historiqueAbsances
                                            ->where('code_etudiant', $etudiant->code_etudiant)
                                            ->first();
                                    @endphp
                                    {{ $presance->presences ?? 0 }} de présences<br>
                                    {{ $presance->absences_non_justifier ?? 0 }} d'absances non justifier<br>
                                    {{ $presance->absences_justifier ?? 0 }} d'absances justifier
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-primary">
                    Validez
                </button>
            </div>
        </form>
    </div>

    <input id="validez" hidden value="{{ $validez }}">
    <script src="{{ asset('js/script_affecter_absances.js') }}"></script>


    <link rel="stylesheet" href="{{ asset('css/common_datatables.css') }}">
@endsection
