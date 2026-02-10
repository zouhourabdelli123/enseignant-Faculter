@extends('dashbaord.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/custom_datatables.css') }}">

<div class="page-container">
    <div class="header-section">
        <div class="header-text">
            <h2 class="page-title">Notes {{ $nom_evaluation }}</h2>
            <p class="page-subtitle">Saisie des notes pour l'évaluation</p>
        </div>
    </div>



    <!-- DATATABLE -->
    <div class="table-card">
        <div class="table-card-header">
            <h3 class="table-title">Liste des étudiants</h3>
        </div>

        <form action="{{ route('affecter_notes_etudiants') }}" method="post" id='myForm'>
            @csrf

            @if ($valider == 0)
            <div class="action-bar" style="margin-bottom: 1rem; display: flex; justify-content: flex-end;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check"></i> Valider les notes
                </button>
            </div>
            @endif

            <table id="suiviTable" class="display" style="width:100%" data-page-length="100">
                <thead>
                    <tr>
                        @if ($nom_evaluation == 'Examen Principal' || $nom_evaluation == 'Examen Rattrappage')
                        <th>Code Examen</th>
                        @else
                        <th>Code Étudiant</th>
                        <th>Nom & Prénom</th>
                        @endif
                        <th class="no-sort" style="width: 150px;">Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etudians as $etudian)
                    <tr>
                        @if ($nom_evaluation == 'Examen Principal' || $nom_evaluation == 'Examen Rattrappage')
                        <td>
                            <input name='code_etudient{{ $etudian->code_genere_examan }}'
                                value='{{ $etudian->code_etudiant }}' hidden>
                            <span class="code-badge">
                                {{ $etudian->code_genere_examan }}
                            </span>
                        </td>
                        @else
                        <td><span class="code-badge">{{ $etudian->code_etudiant }}</span></td>
                        <td><span class="student-name">{{ $etudian->etudiant->nom }} {{ $etudian->etudiant->prenom }}</span></td>
                        @endif
                        <td>
                            @if ($valider == 0)
                            <div class="input-wrapper">
                                <input type="number" max="20" min="0" step="0.05" class="note-input"
                                    name='{{ isset($etudian->code_genere_examan) ? $etudian->code_genere_examan : $etudian->code_etudiant }}'
                                    value="{{ isset($etudian->note) ? $etudian->note : 0 }}">
                            </div>
                            @else
                            <span class="note-display {{ ($etudian->note ?? 0) < 10 ? 'danger' : 'success' }}">
                                {{ isset($etudian->note) ? $etudian->note : 0 }}/20
                            </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</div>

<script>
    const notesIndexUrl = "{{ route('affiche_liste_etudiants') }}";
</script>
<script src="{{ asset('js/custom_datatables.js') }}"></script>

@endsection