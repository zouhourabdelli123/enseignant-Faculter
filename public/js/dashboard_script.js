function chargementAlert() {
    Swal.fire({
        title: 'Chargement...',
        text: 'Veuillez patienter',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
}