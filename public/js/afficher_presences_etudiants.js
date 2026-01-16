// ====================================
// AFFICHER PRÉSENCES ÉTUDIANTS
// ====================================

$(document).ready(function() {
    $('#etudiantsTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json'
        },
        order: [[0, 'asc']],
        pageLength: 25
    });
});
