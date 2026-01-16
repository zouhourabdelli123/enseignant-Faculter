
function openAddDocumentModal() {
    const modal = document.getElementById('addDocumentModal');
    modal.style.display = 'flex';
}

function closeAddDocumentModal() {
    const modal = document.getElementById('addDocumentModal');
    modal.style.display = 'none';
    
    document.getElementById('statutInput').value = '';
    document.getElementById('etablissementInput').value = '';
    document.getElementById('gradeInput').value = '';
    document.getElementById('fileInput').value = '';
}

function addDocument() {
    const statut = document.getElementById('statutInput').value;
    const etablissement = document.getElementById('etablissementInput').value;
    const grade = document.getElementById('gradeInput').value;
    const file = document.getElementById('fileInput').files[0];
    
    if (!statut || !etablissement || !grade || !file) {
        alert('Veuillez remplir tous les champs et sélectionner un fichier.');
        return;
    }
    
    alert('Document "' + file.name + '" ajouté avec succès !');
    closeAddDocumentModal();
    

}

function downloadDocument(id) {
    alert('Télécharger le document #' + id);
   
}

function openEditDocumentModal(data) {
    const modal = document.getElementById('editDocumentModal');
    if (!modal) {
        return;
    }

    const idInput = document.getElementById('editDocumentId');
    const statutInput = document.getElementById('editStatutInput');
    const etablissementInput = document.getElementById('editEtablissementInput');
    const gradeInput = document.getElementById('editGradeInput');
    const documentNameInput = document.getElementById('editDocumentNameInput');
    const fileInput = document.getElementById('editDocumentFileInput');

    if (idInput) idInput.value = data.id || '';
    if (statutInput) statutInput.value = data.statut || '';
    if (etablissementInput) etablissementInput.value = data.etablissement || '';
    if (gradeInput) gradeInput.value = data.grade || '';
    if (documentNameInput) documentNameInput.value = data.document || '';
    if (fileInput) fileInput.value = '';

    modal.classList.add('show');
}

function closeEditDocumentModal() {
    const modal = document.getElementById('editDocumentModal');
    if (modal) {
        modal.classList.remove('show');
    }
}

function closeModalOnOutside(event, modalId) {
    if (event.target.id === modalId) {
        if (modalId === 'editDocumentModal') {
            closeEditDocumentModal();
        } else if (modalId === 'addDocumentModal') {
            closeAddDocumentModal();
        }
    }
}

function editDocument(id, button) {
    const row = button ? button.closest('tr') : null;
    const cells = row ? row.querySelectorAll('td') : [];
    const getCellText = (index) => (cells[index] ? cells[index].textContent.trim() : '');

    openEditDocumentModal({
        id,
        statut: getCellText(1),
        etablissement: getCellText(2),
        grade: getCellText(3),
        document: getCellText(4)
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const editForm = document.getElementById('editDocumentForm');
    if (editForm) {
        editForm.addEventListener('submit', function (event) {
            event.preventDefault();
            closeEditDocumentModal();
        });
    }
});

document.addEventListener('click', function(event) {
    const modal = document.getElementById('addDocumentModal');
    if (event.target === modal) {
        closeAddDocumentModal();
    }
});
