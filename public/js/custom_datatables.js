$(document).ready(function () {
    // Determine page length from data attribute or default to 25
    var pageLength = $('#suiviTable').data('page-length') || 25;

    // DataTable initialization
    $('#suiviTable').DataTable({
        language: {
            search: "Rechercher:",
            lengthMenu: "Afficher _MENU_ éléments",
            info: "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
            infoEmpty: "Aucun élément trouvé",
            infoFiltered: "(filtré de _MAX_ éléments au total)",
            paginate: {
                first: "Premier",
                last: "Dernier",
                next: "Suivant",
                previous: "Précédent"
            },
            zeroRecords: "Aucun élément trouvé"
        },
        pagingType: "simple_numbers",
        pageLength: pageLength,
        columnDefs: [{
                orderable: false,
                targets: 'no-sort'
            } 
        ]
    });
});
