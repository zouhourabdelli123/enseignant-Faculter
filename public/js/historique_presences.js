// ====================================
// HISTORIQUE DES PRÉSENCES
// ====================================

let dataTable;

// Fonction pour afficher l'historique
function afficherHistorique() {
    const annee = document.getElementById('anneeSelect').value;
    const semestre = document.getElementById('semestreSelect').value;

    if (!annee || !semestre) {
        alert('Veuillez sélectionner une année et un semestre.');
        return;
    }

    // Fermer le modal
    document.getElementById('filterModal').classList.add('hidden');

    // Charger les données (simulation)
    chargerDonnees(annee, semestre);
}

// Charger les données dans le tableau
function chargerDonnees(annee, semestre) {
    // Données de démonstration
    const donneesDemo = [
        {id: 1, date: 'le 2025-09-15 08:30:00', matiere: 'Génie logiciel et informatique décisionnelle', presence: 'Présent'},
        {id: 2, date: 'le 2025-09-15 12:30:00', matiere: 'Génie logiciel et informatique décisionnelle', presence: 'Présent'},
        {id: 3, date: 'le 2025-09-16 08:30:00', matiere: 'Développement des systèmes Communicants', presence: 'Absent'},
        {id: 4, date: 'le 2025-09-17 08:30:00', matiere: 'Développement des systèmes Communicants', presence: 'Présent'},
    ];

    // Détruire le DataTable existant s'il existe
    if (dataTable) {
        dataTable.destroy();
    }

    // Remplir le tableau
    const tbody = document.querySelector('#historiqueTable tbody');
    tbody.innerHTML = '';
    
    donneesDemo.forEach(row => {
        const statusClass = row.presence === 'Présent' ? 'status-present' : 'status-absent';
        tbody.innerHTML += `
            <tr>
                <td>${row.date}</td>
                <td>${row.matiere}</td>
                <td><span class="status-badge ${statusClass}">${row.presence}</span></td>
                <td>
                    <a href="/afficher-presences-etudiants/${row.id}" class="btn btn-primary" style="font-size: 0.85rem; padding: 0.5rem 1rem;">
                        <i class="fas fa-eye"></i>
                        Afficher l'absence des étudiants
                    </a>
                </td>
            </tr>
        `;
    });

    // Initialiser DataTable
    dataTable = $('#historiqueTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json'
        },
        order: [[0, 'desc']],
        pageLength: 10
    });

    // TODO: Implémenter le chargement réel via AJAX
    // $.ajax({
    //     url: '/historique-presences/data',
    //     method: 'POST',
    //     data: { annee: annee, semestre: semestre },
    //     success: function(response) {
    //         // Traiter les données reçues
    //     }
    // });
}

// Rouvrir le modal pour changer les filtres
function ouvrirModal() {
    document.getElementById('filterModal').classList.remove('hidden');
}
