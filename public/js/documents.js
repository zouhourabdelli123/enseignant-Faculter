
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

function editDocument(id) {
    alert('Modifier le document #' + id);
}

function downloadDocument(id) {
    alert('Télécharger le document #' + id);
   
}

document.addEventListener('click', function(event) {
    const modal = document.getElementById('addDocumentModal');
    if (event.target === modal) {
        closeAddDocumentModal();
    }
});
