$(document).ready(function () {
    // SweetAlert initialization
    if (document.getElementById('validez')) {
        var validez = document.getElementById('validez').value;
        if (validez == 1) {
            Swal.fire({
                title: 'Success',
                text: 'L’affectation de la présence a été réalisée avec succès.',
                icon: 'success',
                confirmButtonText: 'Merci'
            });
        }
    }

    // DataTable initialization
    $('#suiviTable').DataTable({
        language: {
            search: "Rechercher:",
            lengthMenu: "Afficher _MENU_ étudiants",
            info: "Affichage de _START_ à _END_ sur _TOTAL_ étudiants",
            infoEmpty: "Aucun étudiant trouvé",
            infoFiltered: "(filtré de _MAX_ étudiants au total)",
            paginate: {
                first: "Premier",
                last: "Dernier",
                next: "Suivant",
                previous: "Précédent"
            },
            zeroRecords: "Aucun étudiant trouvé"
        },
        pagingType: "simple_numbers",
        pageLength: 25,
        columnDefs: [{
                orderable: false,
                targets: [3, 4]
            } // Disable sorting for checkbox and history columns
        ]
    });
});
