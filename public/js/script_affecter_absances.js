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
});
